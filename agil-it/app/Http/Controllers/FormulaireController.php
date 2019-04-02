<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulaireController extends Controller
{
    function index(){
        return view('formulaire');
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

            'Statut' => ['required'],
            'categEmployeur' => ['required',],
            'nomEmployeur' => ['required','string','max:255'],
            'debutContrat' => ['required','date'],
            'finContrat' => ['required', 'date', 'after:debutContrat'],
            'entreprise' => ['required'],
            'sitePrincipal' =>['required'],
            'BatimentPrincipal' => ['required'],
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
                "status",
                "categEmployeur",
                "nomEmployeur",
                "debutContrat",
                "finContrat",
                "entreprise",
                "sitePrincipal",
                "BatimentPrincipal",
                "Bureau",
                "NumTelPlateau",
            ]);
    }
}
