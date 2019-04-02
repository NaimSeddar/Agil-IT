<?php
/**
 * Created by PhpStorm.
 * User: alexandre.duhem
 * Date: 02/04/19
 * Time: 16:25
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{

    public function afficherInscriptions()
    {
        $inscriptions = DB::table('contact_entreprise')->select('*');
        return view('inscription/inscriptions', ['inscriptions' => $inscriptions]);
    }

}