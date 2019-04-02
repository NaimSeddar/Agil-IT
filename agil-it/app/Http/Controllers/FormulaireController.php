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

    function send(Request $request){
        $this->validate($request, [
            'civilite' => ['required'],
            'nomNaissance' => ['required','string','max:255'],
            'nom' => ['required','string','max:255'],
            'prenom' => ['required','string','max:255'],
            'dateNaissance' => ['required','date','before:today'],
            'nationalite' => ['required'],

            'mailPro' =>['required', 'email', 'max:255'],
            'NumTelPerso' => ['required', 'string', 'max:100'],
            'mailPerso' => ['required', 'email', 'max:255'],

            'nomContact' => ['required','string','max:255'],
            'prenomContact' => ['required','string','max:255'],
            'telContact' => ['required', 'string','max:100'],

            'statut' => ['required'],
            'categEmployeur' => ['required'],
            'nomEmployeur' => ['required','string','max:255'],
            'debutContrat' => ['required','date'],
            'finContrat' => ['required', 'date', 'after:debutContrat'],
            'entreprise' => ['required'],
            'Bureau' => ['required'],
            'NumTelPlateau' => ['required', 'string', 'max:100'],
        ]);

        $input=$request->only(
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
                "NumTelPlateau",
            ]);

        $contact = DB::table('personnesPrevenirEnCasUrgence')->where('nom',$input["nomContact"])->count();
        if($contact == 0){
            DB::table('personnesPrevenirEnCasUrgence')->insert([
                'nom' => $input['nomContact'],
                'prenom' => $input['prenomContact'],
                'numeroTelephone' => $input['telContact']
            ]);
        }

        $contactId = DB::table('personnesPrevenirEnCasUrgence')->select('id')->where('nom',$input['nomContact'])->first();
        $entrepriseId = DB::table('entreprise')->select('id')->where('nom',$input['entreprise'])->first();
        $typeContrat = null;

        if(isset($input['finContrat'])){
            $typeContrat = "CDD";
        }else{
            $typeContrat = "CDI";
        }

        DB::table('contact_entreprise')->insert([
            'nomNaissance' => $input['nomNaissance'],
            'nom' => $input['nom'],
            'prenom' => $input['prenom'],
            'dateNaissance' => $input['dateNaissance'],
            'mailPro' => $input['mailPro'],
            'mailPerso' => $input['mailPerso'],
            'telephone' => $input['NumTelPerso'],
            'civilite' => $input['civilite'],
            'nationalite' => $input['nationalite'],
            'statusEntreprise' => $input['status'],
            'categEmployeur' => $input['categEmployeur'],
            'idPersContact' => $contactId,
            'idEntreprise' => $entrepriseId,
            'typeContrat' => $typeContrat,
            'dateDebutContrat' => $input['debutContrat'],
            'dateFinContrat' => $input['finContrat'],
            'Bureau' => $input['Bureau'],
            'telBureau' => $input['NumTelPlateau'],
            'valider' => false
        ]);

        return redirect(route('welcome'));
    }
}
