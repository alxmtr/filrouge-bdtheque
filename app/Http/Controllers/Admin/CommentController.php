<?php

namespace App\Http\Controllers\Admin;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Comment;

use App\Http\Controllers\Admin\AdminController;

class CommentController extends AdminController
{
    /**
     * Retourne la vue de gestion des commentaires en attente.
     */
    public function pendingComments()
    {
        $comments = Comment::orderBy('com_date', 'desc')->with('comic')->where('online', false)->get();
        return view('admin.comments.index', ['comments' => $comments]);
    }

    /**
     * Retourne la vue de gestion des commentaires validés.
     */
    public function approvedComments()
    {
        $comments = Comment::orderBy('com_date', 'desc')->with('comic')->where('online', true)->get();
        return view('admin.comments.index', ['comments' => $comments]);
    }

    /**
     * Valide un commentaire.
     *
     * @param int $id
     */
    public function approve($id)
    {
        $comment = Comment::find($id);
        $comment->online = true;
        $comment->save();

        Session::flash('success_message', "Commentaire validé !");

        return redirect()->back();
    }

    /**
     * Retourne la vue du formulaire de modification d'un commentaire.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('admin.comments.edit', ['comment' => $comment]);
    }

    /**
     * Met à jour un commentaire.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->content = $request->message;
        $comment->save();

        Session::flash('success_message', "Commentaire modifié !");

        return redirect()->back();
    }

    /**
     * Supprime un commentaire.
     *
     * @param int $id
     */
    public function delete($id)
    {
        Comment::destroy($id);

        Session::flash('success_message', "Commentaire supprimé !");

        return redirect()->back();
    }
}
