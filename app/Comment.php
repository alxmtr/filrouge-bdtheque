<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Date\Date;

class Comment extends Model
{
    // Nom de la table à utiliser
    protected $table = 'commentaires';

    // Clé primaire
    protected $primaryKey = 'com_id';

    // Champs "mappés" et renvoyés
    protected $appends = ['id', 'username', 'content'];

    // Champs "cachés"
    protected $hidden = ['com_id', 'com_auteur', 'com_texte', 'com_bd_id'];

    // Pas besoin des timestamps
    public $timestamps = false;

    protected $dates = ['com_date'];

    protected $fillable = ['username', 'content', 'comic_id'];

    /**
     * Retourne l'id du commentaire.
     *
     * @return int
     */
    public function getIdAttribute($value)
    {
        return $this->attributes['com_id'];
    }

    /**
     * Retourne le nom de l'utilisateur ayant posté le commentaire.
     *
     * @return string
     */
    public function getUsernameAttribute($value)
    {
        return $this->attributes['com_auteur'];
    }

    /**
     * Défini l'auteur du commentaire.
     */
    public function setUsernameAttribute($value)
    {
        return $this->attributes['com_auteur'] = $value;
    }

    /**
     * Retourne le contenu du commentaire.
     *
     * @return string
     */
    public function getContentAttribute($value)
    {
        return $this->attributes['com_texte'];
    }

    /**
     * Défini le contenu du commentaire.
     */
    public function setContentAttribute($value)
    {
        return $this->attributes['com_texte'] = $value;
    }

    /**
     * Retourne le temps écoulé depuis l'ajout du commentaire
     *
     * @return string
     */
    public function getComDateAttribute($value)
    {
        return Date::parse($value)->diffForHumans();
    }

    /**
     * Retourne l'id de la BD à laquelle appartient le commentaire.
     *
     * @return int
     */
    public function getComicIdAttribute($value)
    {
        return $this->attributes['com_bd_id'];
    }

    /**
     * Défini l'ID de la BD à laquelle appartient le commentaire.
     */
    public function setComicIdAttribute($value)
    {
        return $this->attributes['com_bd_id'] = $value;
    }

    /**
     * Retourne la BD à laquelle appartient le commentaire.
     *
     * @return \App\Comic
     */
    public function comic()
    {
        return $this->belongsTo('App\Comic', 'com_bd_id', 'bd_id');
    }
}
