<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Comic;
use App\Theme;

class ComicController extends Controller
{
    /**
     * Retourne la vue de toutes les BD.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $isSearch = false;

        if (isset($request->search) && !empty($request->search)) {
            $isSearch = true;
            $search = $request->search;
            $comics = Comic::with('author')
                ->where("bd_titre", "LIKE", "%$search%")
                ->paginate(5);
        } else {
            $comics = Comic::orderBy('bd_id', 'desc')->paginate(5);
        }
        
        $themes = Theme::orderBy('th_intitule', 'asc')->get();
        
        return view('comics.index', [
            'comics' => $comics, 
            'themes' => $themes, 
            'isSearch' => $isSearch
        ]);
    }

    /**
     * Retourne la vue de la BD avec ses infos, ainsi que ses commentaires.
     *
     * @param int $id
     */
    public function show($id)
    {
        $comic = Comic::with(['author', 'themes', 'comments' => function ($query) {
            $query->where('online', true);
        }])
        ->findOrFail($id);

        return view('comics.show', ['comic' => $comic]);
    }
}
