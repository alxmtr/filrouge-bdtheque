<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Comic;
use App\Theme;
use App\Author;
use App\Comment;

use App\Http\Controllers\Admin\AdminController;

class HomeController extends AdminController
{
    /**
     * Retourne la vue de l'accueil de l'administration avec les statistiques 
     * du site.
     */
    public function index()
    {
        $comics = Comic::count();
        $authors = Author::count();
        $themes = Theme::count();
        $online_comments = Comment::where('online', true)->count();
        $pending_comments = Comment::where('online', false)->count();

        return view('admin.home', [
            'comics' => $comics,
            'authors' => $authors,
            'themes' => $themes,
            'online_comments' => $online_comments,
            'pending_comments' => $pending_comments,
        ]);
    }
}
