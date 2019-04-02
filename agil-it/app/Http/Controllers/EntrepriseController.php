<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    function createEntreprise()
    {
            $contacts = DB::table('contact_entreprise')->where('idEntreprise', null)->get();
            return view('entreprise/createEntreprise', ['contacts' => $contacts]);
    }

    function enregistrerEntreprise(Request $request){

        $this->validate($request,
            [
                "nom" => ["required"],
                "siret" => ["required"],
                "nomPDG" => ["required"],
                "siteP" => ["required"],
                "batimentP" => ["required"],



            ]);

        $input = $request->only(["nom", "siret", "nomPDG","siteP","batimentP","bureau","telephone"]);
        DB::table("entreprise")->insert([
            "nom" => $input["nom"],
            "siret" => $input["siret"],
            "nomPDG" => $input["nomPDG"],
            "siteP" => $input["siteP"],
            "batimentP" => $input["batimentP"],
            'valider' => 0

        ]);

        return redirect(route('welcome'));
    }

}