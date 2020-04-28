<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    // Nom de la table à utiliser
    protected $table = 'auteurs';

    // Clé primaire : 'aut_id' à la place de 'id'.
    protected $primaryKey = 'aut_id';

    // Champs "mappés" et renvoyés
    protected $appends = ['id', 'name'];

    // Champs cachés
    protected $hidden = ['aut_id', 'aut_nom'];

    // Pas d'utilisation des timestamps ici
    public $timestamps = false;

    /**
     * Retourne l'id de l'auteur.
     *
     * @return int
     */
    public function getIdAttribute($value)
    {
        return $this->attributes['aut_id'];
    }

    /**
     * Retourne le nom de l'auteur.
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return $this->attributes['aut_nom'];
    }

    /**
     * Retourne les BD associés à l'auteur.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function comics()
    {
        return $this->hasMany('App\Comic', 'bd_auteur_id');
    }
}
