<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormulaireController extends Controller
{
    function index(){
        $entreprise = DB::table('entreprise')->pluck('nom');
        return view('formulaire',['entreprises' => $entreprise]);
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'civilite' => ['required'],
            'nomNaissance' => ['required'],
            'nom' => ['required'],
            'prenom' => ['required'],
            'dateNaissance' => ['required', 'date'],
            'nationalite' => ['required'],

            'mailPro' => ['required'],
            'NumTelPerso' => ['required'],
            'mailPerso' => ['required'],

            'nomContact' => ['required'],
            'prenomContact' => ['required'],
            'telContact' => ['required'],

            'statut' => ['required'],
            'categEmployeur' => ['required'],
            'nomEmployeur' => ['required'],
            'debutContrat' => ['required', 'date'],
            'finContrat' => ['required', 'date'],
            'entreprise' => ['required'],
            'Bureau' => ['required'],
            'NumTelPlateau' => ['required'],
        ]);

        $input = $request->only(
            [
                "civilite",
                "nomNaissance",
                "nom",
                "prenom",
                "dateNaissance",
                "nationalite",
                "mailPro",
                "NumTelPerso",
                "mailPerso",
                "nomContact",
                "prenomContact",
                "telContact",
                "statut",
                "categEmployeur",
                "nomEmployeur",
                "debutContrat",
                "finContrat",
                "entreprise",
                "Bureau",
                "NumTelPlateau"
            ]);


        $contactPresent = DB::table('contact_entreprise')
            ->where('nom','\''.$input['nom'].'\'')
            ->where('prenom','\''.$input['prenom'].'\'')
            ->count();


        if ($contactPresent == 0) {
            $contact = DB::table('personnesPrevenirEnCasUrgence')->where('nom', $input["nomContact"])->count();
            if ($contact == 0) {
                DB::table('personnesPrevenirEnCasUrgence')->insert([
                    'nom' => $input['nomContact'],
                    'prenom' => $input['prenomContact'],
                    'numeroTelephone' => $input['telContact']
                ]);
            }

            $contactId = DB::table('personnesPrevenirEnCasUrgence')->where('nom', $input['nomContact'])->first();
            $entrepriseId = DB::table('entreprise')->where('nom', $input['entreprise'])->first();
            $typeContrat = null;

            if (isset($input['finContrat'])) {
                $typeContrat = "CDD";
            } else {
                $typeContrat = "CDI";
            }

            // $data = array();

            $values = [
                'nomNaissance' => '\'' . $input['nomNaissance'] . '\'',
                'nom' => '\'' . $input['nom'] . '\'',
                'prenom' => '\'' . $input['prenom'] . '\'',
                'dateNaissance' => $input['dateNaissance'],
                'mailPro' => '\'' . $input['mailPro'] . '\'',
                'mailPerso' => '\'' . $input['mailPerso'] . '\'',
                'telephone' => '\'' . $input['NumTelPerso'] . '\'',
                'civilite' => '\'' . $input['civilite'] . '\'',
                'nationalite' => '\'' . $input['nationalite'] . '\'',
                'statusEntreprise' => '\'' . $input['statut'] . '\'',
                'categEmployeur' => '\'' . $input['categEmployeur'] . '\'',
                'idPersContact' => $contactId->id,
                'idEntreprise' => $entrepriseId->id,
                'typeContrat' => '\'' . $typeContrat . '\'',
                'dateDebutContrat' => $input['debutContrat'],
                'dateFinContrat' => $input['finContrat'],
                'Bureau' => '\'' . $input['Bureau'] . '\'',
                'telBureau' => '\'' . $input['NumTelPlateau'] . '\'',
                'valider' => 0,
            ];
            //$data = $values;

            $values = (array)json_decode(json_encode($values), true);

            DB::table('contact_entreprise')->insert($values);


        }
        return redirect(route('welcome'));
    }
}
