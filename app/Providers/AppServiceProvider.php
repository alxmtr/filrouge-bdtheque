<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use File;

use App\Comic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Suppression de l'image d'une bande dessinée, des commentaires associés 
         * et détachement des thèmes lors d'une suppression. 
         * (voir https://laravel.com/docs/5.2/eloquent#events)
         */
        Comic::deleting(function ($comic) {
            File::delete('/public/uploads/' . $comic->image);
            $comic->comments()->delete();
            $comic->themes()->detach();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
