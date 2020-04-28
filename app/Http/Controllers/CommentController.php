<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Enregistre un commentaire et redirige sur la page de la BD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $comic_id
     */
    public function store(Request $request, $comic_id)
    {
        $this->validate($request, [
            'username' => 'required|min:4|max:30|alpha_num',
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->com_auteur = $request->username;
        $comment->com_texte = $request->message;
        $comment->com_bd_id = $comic_id;

        $comment->save();

        Session::flash('success_message', 
            "Commentaire envoyé ! Il sera visible une fois validé par l'administrateur.");

        return redirect()->route('comic.show', ['id' => $comic_id]);
    }
}
