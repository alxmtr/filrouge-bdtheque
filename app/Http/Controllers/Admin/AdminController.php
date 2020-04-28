<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Créé une nouvelle instance du contrôleur.
     * Active le middleware d'authentification pour la partie admin.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
