<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Accueil du site, affichage des BD
Route::get('/', [
    'as' => 'home',
    'uses' => 'ComicController@index'
]);

// Affichage d'une BD
Route::get('comic/{id}', [
    'as' => 'comic.show',
    'uses' => 'ComicController@show'
]);

// Affichage des BD d'un thème
Route::get('theme/{id}', [
    'as' => 'theme.show',
    'uses' => 'ThemeController@show'
]);

// Enregistrement d'un commentaire
Route::post('comic/{id}/comment/store', [
    'as' => 'comment.store',
    'uses' => 'CommentController@store'
]);


/**
 * Partie administration
 */
Route::group(['prefix' => 'admin'], function () {

    /**
     * Routes utilisants les contrôleurs du namespace 'Auth'.
     */
    Route::group(['namespace' => 'Auth'], function () {
        // Page de connexion
        Route::get('login', [
            'as' => 'admin.login',
            'uses' => 'AuthController@showLoginForm'
        ]);
        // Connexion
        Route::post('login', [
            'as' => 'admin.login',
            'uses' => 'AuthController@login'
        ]);
        // Déconnexion
        Route::get('logout', [
            'as' => 'admin.logout',
            'uses' => 'AuthController@logout'
        ]);
    });

    /**
     * Routes utilisants les contrôleurs du namespace 'Admin'.
     */
    Route::group(['namespace' => 'Admin'], function () {

        // Accueil de la partie admin
        Route::get('/', [
            'as' => 'admin.home',
            'uses' => 'HomeController@index'
        ]);
        // Gestion des commentaires en attente
        Route::get('pending_comments', [
            'as' => 'admin.pending_comments',
            'uses' => 'CommentController@pendingComments'
        ]);
        // Gestion des commentaires validés
        Route::get('comments', [
            'as' => 'admin.comments',
            'uses' => 'CommentController@approvedComments'
        ]);

        /**
         * Gestions des commentaires
         */
        Route::group(['prefix' => 'comment/{id}'], function ($id) {

            // Modification d'un commentaire
            Route::get('edit', [
                'as' => 'admin.comment.edit',
                'uses' => 'CommentController@edit'
            ]);
            // Mise à jour du commentaire dans la base
            Route::put('edit', [
                'as' => 'admin.comment.update',
                'uses' => 'CommentController@update'
            ]);
            // Validation d'un commentaire
            Route::patch('approve', [
                'as' => 'admin.comment.approve',
                'uses' => 'CommentController@approve'
            ]);
            // Suppression d'un commentaire
            Route::delete('delete', [
                'as' => 'admin.comment.delete',
                'uses' => 'CommentController@delete'
            ]);

        });

        /**
         * Gestion des BD
         */
        Route::get('comics', [
            'as' => 'admin.comics',
            'uses' => 'ComicController@index'
        ]);

        Route::group(['prefix' => 'comic'], function () {

            // Ajout d'une BD
            Route::get('new', [
                'as' => 'admin.comic.new',
                'uses' => 'ComicController@add'
            ]);
            // Enregistrement d'une BD
            Route::post('store', [
                'as' => 'admin.comic.store',
                'uses' => 'ComicController@store'
            ]);
            // Suppression d'une BD
            Route::delete('{id}/delete', [
                'as' => 'admin.comic.delete',
                'uses' => 'ComicController@delete'
            ]);
            // Ajout d'un thème à une BD
            Route::get('{id}/add_theme', [
                'as' => 'admin.comic.add_theme',
                'uses' => 'ComicController@addTheme'
            ]);
            Route::post('{id}/store_theme', [
                'as' => 'admin.comic.store_theme',
                'uses' => 'ComicController@storeTheme'
            ]);

        });

        /**
         * Ajout d'un auteur
         */
        Route::group(['prefix' => 'author'], function () {
            Route::get('new', [
                'as' => 'admin.author.new',
                'uses' => 'AuthorController@add'
            ]);
            // Enregistrement de l'autuer
            Route::post('store', [
                'as' => 'admin.author.store',
                'uses' => 'AuthorController@store'
            ]);
        });

        /**
         * Ajout d'un thème
         */
        Route::group(['prefix' => 'theme'], function () {
            Route::get('new', [
                'as' => 'admin.theme.new',
                'uses' => 'ThemeController@add'
            ]);
            // Enregistrement de l'autuer
            Route::post('store', [
                'as' => 'admin.theme.store',
                'uses' => 'ThemeController@store'
            ]);
        });

    });

});
