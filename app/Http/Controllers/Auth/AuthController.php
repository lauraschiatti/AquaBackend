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

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'user'])) {
            // Authentication passed...
            //@todo: mostrar usuario que inicio sesion
            $user = $email;
            return "logged in!";
        }

        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'provider']) ||
            Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'superadmin'])) {
            // Authentication passed...
            //@todo: mostrar usuario que inicio sesion
            return view('layout.dashboard');
        }

        if(!(Auth::attempt(['email' => $email, 'password' => $password]))){
            $error = "WRONG USER OR PASSWORD";
            return view('auth.login', compact('error'));
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('login');

    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(){
        $user = User::where("email", "=", Input::get('email'))->first();
        //$user = Request::all();

        if(Input::get('pass')!= Input::get('pass2')){
            $error = "PASSWORDS DON´T MATCH";
            return view('auth.register', compact('error'));
        }else{
            if($user == null){
                $newUser = new User;
                $newUser->name = Input::get('name');
                $newUser->email = Input::get('email');
                $newUser->password = Input::get('pass');
                $newUser->role = "user";
                $newUser->save();
                return redirect('/');
                //return $newUser;

                //@todo iniciar sesion automaticamente
                //Auth::loginUsingId(1); o Auth::login($user);

            }else{
                $error = "USER ALREADY EXISTS";
                return view('auth.register', compact('error'));
            }
        }
    }
}
