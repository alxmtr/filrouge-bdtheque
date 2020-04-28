<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    // Nom de la table à utiliser
    protected $table = 'bandesdessinees';

    // On indique que la clé primaire sera 'bd_id' à la place de 'id'
    protected $primaryKey = 'bd_id';

    // Les noms des champs "mappés" et renvoyés
    protected $appends = ['id', 'title', 'description', 'image'];

    // Les champs dont on a pas besoin
    protected $hidden = ['bd_id', 'bd_titre', 'bd_resume', 'bd_image', 'bd_auteur_id'];

    // Pas besoin des timestamps (created_at, updated_at)
    public $timestamps = false;

    /**
     * Retourne l'ID de la BD.
     *
     * @return int
     */
    public function getIdAttribute($value)
    {
        return $this->attributes['bd_id'];
    }

    /**
     * Retourne le titre de la BD.
     *
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return $this->attributes['bd_titre'];
    }

    /**
     * Retourne le résumé de la BD.
     *
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        return $this->attributes['bd_resume'];
    }

    /**
     * Retourne le nom du fichier image de la BD.
     *
     * @return string
     */
    public function getImageAttribute($value)
    {
        return $this->attributes['bd_image'];
    }

    /**
     * Retourne l'ID de l'auteur de la BD.
     *
     * @return int
     */
    public function getAuthorIdAttribute($value)
    {
        return $this->attributes['bd_auteur_id'];
    }

    /**
     * Retourne l'auteur de la BD.
     *
     * @return \App\Author
     */
    public function author()
    {
        return $this->belongsTo('App\Author', 'bd_auteur_id', 'aut_id');
    }

    /**
     * Retourne les thèmes associés à la BD.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function themes()
    {
        return $this->belongsToMany('App\Theme', 'liens_bd_themes', 
            'lien_bd_id', 'lien_themes_id');
    }

    /**
     * Retourne les commentaires associés à la BD.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'com_bd_id');
    }
}
