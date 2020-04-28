<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Theme;

class ThemeController extends Controller
{
    /**
     * Retourne la vue du formulaire d'ajout de thème.
     */
    public function add()
    {
        return view('admin.themes.new');
    }

    /**
     * Enregistre un thème et redirige.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255'
        ]);
        
        $theme = new Theme;
        $theme->th_intitule = $request->name;
        $theme->save();
        
        Session::flash('success_message', 'Thème ajouté !');
        return redirect()->back();
    }
}
