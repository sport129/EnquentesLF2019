<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    | Esse controlador lida com usuários autenticados do aplicativo e os redireciona para sua tela inicial. 
    | O controlador usa uma característica para fornecer convenientemente sua funcionalidade aos seus aplicativos.
    */
    use AuthenticatesUsers;

    /**
     * Para onde o usuário será redirecionado, esse caso irá para a página home
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Criando uma nova instancia do controlador, banco de dados utilizado é o mysql
     * Pois o banco de dados sqlserver usuário não possuí permissão de criar ou atualizar o banco
     * 
     * @return void
     */
    public function __construct()
    {
        //definindo o banco de dados padrão do sistema de login
        DB::setDefaultConnection('mysql');
        $this->middleware('guest')->except('logout');
    }


    public function username()
    {
        //Identificicador do usuário, podendo ser por e-mail ou nome (login), por padrão a identificação é por e-mail, mas nessa aplicação, o padrão será o login.
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }
    /**
     *
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'identity' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'identity.required' => 'name or email is required',
                'password.required' => 'Password is required',
            ]
        );
    }
    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        // Load user from database
        $user = \App\User::where($this->username(), $request->{$this->username()})->first();
        // Check if user was successfully loaded, that the password matches
        // and active is not 1. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->active != 1) {
            $errors = [$this->username() => 'Sua Conta Não Existe'];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

}
