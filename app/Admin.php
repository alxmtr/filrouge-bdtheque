<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // Nom de la table
    protected $table = 'admins';

    // Pas d'utilisation des timestamps
    public $timestamps = false;

    /**
     * Les champs pouvant être remplis.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'password',
    ];

    /**
     * Les champs devant rester cachés (pas retournés).
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
