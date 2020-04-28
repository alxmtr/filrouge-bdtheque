<?php

namespace App\Http\Controllers\Admin;

use Session;
use DB;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Comic;
use App\Author;
use App\Theme;
use App\Comment;

use App\Http\Controllers\Admin\AdminController;

class ComicController extends AdminController
{
    /**
     * Retourne la vue de gestion des bandes dessinées.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $comics = Comic::orderBy('bd_id', 'desc')->with('author', 'themes')->paginate(5);
        return view('admin.comics.index', ['comics' => $comics]);
    }

    /**
     * Retourne la vue du formulaire d'ajout de BD.
     */
    public function add()
    {
        $authors = Author::orderBy('aut_nom', 'asc')->get();
        return view('admin.comics.new', ['authors' => $authors]);
    }

    /**
     * Enregistre une BD avec upload de son image et redirige.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'author' => 'required|not_in:0|integer',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $comic = new Comic;
        $comic->bd_titre = $request->title;
        $comic->bd_auteur_id = $request->author;
        $comic->bd_resume = $request->description;
        $comic->bd_image = time() . '.' . $request->file('image')
            ->getClientOriginalExtension();

        $comic->save(); // Ajout de la bd à la base de données

        // Upload de l'image dans le repertoire public/images/
        $upload = $request->file('image')
            ->move(base_path() . '/public/uploads/', $comic->bd_image);

        // Message de confirmation si l'image a bien été déplacée
        if ($upload) {
            Session::flash('success_message', 
                "La bande dessinée a bien été enregistrée !");
        }

        return redirect()->back();
    }

    /**
     * Supprime une BD et redirige.
     *
     * @param int $id
     */
    public function delete($id)
    {
        $comic = Comic::findOrFail($id);

        /**
         * La suppression des commentaires associés ainsi que le détachement 
         * des thèmes se deroulera dans app/Providers/AppServiceProvider.php 
         * (voir https://laravel.com/docs/5.2/eloquent#events)
         */
        Comic::destroy($id);

        Session::flash('success_message', 
            "La BD \"{$comic->title}\" a bien été supprimée !");

        return redirect()->back();
    }

    /**
     * Retourne la vue du formulaire d'ajout d'un thème.
     *
     * @param int $comic_id
     */
    public function addTheme($comic_id)
    {
        $comic = Comic::findOrFail($comic_id);

        // Thèmes qui ne sont pas attribué à la BD
        $themes = Theme::orderBy('th_intitule', 'asc')
            ->whereNotIn('th_id', function ($query) use ($comic_id) {
                $query->select('lien_themes_id')
                    ->from('liens_bd_themes')
                    ->where('lien_bd_id', $comic_id);
            })->get();

        return view('admin.comics.add_theme', [
            'comic' => $comic,
            'themes' => $themes
        ]);
    }

    /**
     * Enregistre la liaison d'un thème à une BD et redirige.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $comic_id
     */
    public function storeTheme(Request $request, $comic_id)
    {
        $this->validate($request, [
            'theme_id' => 'required|integer'
        ]);

        DB::table('liens_bd_themes')->insert([
            'lien_bd_id' => $comic_id,
            'lien_themes_id' => $request->theme_id
        ]);

        Session::flash('success_message', 'Le thème a bien été ajouté à la BD !');
        return redirect()->back();
    }
}
