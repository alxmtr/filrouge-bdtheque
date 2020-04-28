<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Author;

class AuthorController extends Controller
{
    /**
     * Retourne la vue du formulaire d'ajout d'auteur.
     */
    public function add()
    {
        return view('admin.authors.new');
    }

    /**
     * Enregistre un auteur et redirige.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255'
        ]);
        
        $author = new Author;
        $author->aut_nom = $request->name;
        $author->save();
        
        Session::flash('success_message', 'Auteur ajouté !');
        return redirect()->back();
    }
}
