<?php

namespace App\Http\Controllers\Auth;
use DB;
use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Route vers laquelle rediriger après la connexion.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Route vers laquelle rediriger après la déconnexion.
     *
     * @var string
     */
    protected $redirectAfterLogout = 'admin/login';

    /**
     * Créé une nouvelle instance du contrôleur d'authentification.
     *
     * @return void
     */
    public function __construct()
    {
        $this->username = 'login';
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Retourne la vue du formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }
}
