<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    // Nom de la table à utiliser
    protected $table = 'themes';

    // Clé primaire
    protected $primaryKey = 'th_id';

    // Champs "mappés" et renvoyés
    protected $appends = ['id', 'name'];

    // Champs "cachés"
    protected $hidden = ['th_id', 'th_intitule'];

    // Pas d'utilisation des timestamps
    public $timestamps = false;

    /**
     * Retourne l'id du thème.
     *
     * @return int
     */
    public function getIdAttribute($value)
    {
        return $this->attributes['th_id'];
    }

    /**
     * Retourne l'intitulé du thème.
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return $this->attributes['th_intitule'];
    }

    /**
     * Retourne les BD associés au thème.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function comics()
    {
        return $this->belongsToMany('App\Comic', 'liens_bd_themes', 
            'lien_themes_id', 'lien_bd_id');
    }
}
