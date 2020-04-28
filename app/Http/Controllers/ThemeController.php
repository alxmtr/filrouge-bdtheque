<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Theme;

class ThemeController extends Controller
{
    /**
     * Retourne la vue du thème avec les BD qui y sont associées.
     *
     * @param int $id
     */
    public function show($id)
    {
        $themes = Theme::orderBy('th_intitule', 'asc')->get();
        $theme = Theme::find($id);
        $theme->comics = $theme->comics()->orderBy('bd_id', 'desc')->paginate(5);

        return view('themes.show', ['current_theme' => $theme, 'themes' => $themes]);
    }
}
