<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home.home') ; //home.home à savoir nom_du_répertoire.titre_fichier_avant_point_blade
    }
}
