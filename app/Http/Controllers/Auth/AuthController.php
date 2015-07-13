<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|min:4',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //@todo: remember me

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getAdminLogin()
    {
        return view('auth.admin_login');
    }

    public function postLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'user'])
        || Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'provider'])
        || Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'superadmin'])) {
            // Authentication passed...
            //@todo: mostrar usuario que inicio sesion
            $user = $email;
            return "logged in!";
        }else{
            $error = "WRONG USER OR PASSWORD";
            return view('auth.login', compact('error'));
        }

    }

    public function postAdminLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'provider']) ||
            Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'superadmin'])) {
            // Authentication passed...
            //@todo: mostrar usuario que inicio sesion
            $user = $email;
            return view('layout.dashboard');
        }else{
            $user = User::where("email", "=", $email)->first();
            if($user != null){
                $role = $user->role;

                if($role == 'user'){
                    $error = "ACCESS DENIED";
                }
            }

            if(!(Auth::attempt(['email' => $email, 'password' => $password]))){
                $error = "WRONG USER OR PASSWORD";
            }
            return view('auth.admin_login', compact('error'));
        }

    }

    public function getLogout()
    {
        if(Auth::check() and Auth::user()->role == 'user'){
            Auth::logout();
            return redirect('login');
        }else{
            Auth::logout();
            return redirect('adminlogin');
        }
    }

    public function getRegister()
    {
        return view('auth.register');
    }
}
