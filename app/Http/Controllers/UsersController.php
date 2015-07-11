<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users=User::all(); //json data
        return view('users.index',compact('users')); //pass json data to index view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = User::where("email", "=", Input::get('email'))->first();

        if($user == null){
            $newUser = new User;
            $newUser->name = Input::get('name');
            $newUser->email = Input::get('email');
            $newUser->password = bcrypt(Input::get('password'));
            $newUser->role = 'admin';
            $newUser->save();
        }else{
            //@todo revisar que devolver en caso de que exista el sensor
            return $user;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        //@todo: averiguar si se puede editar el rol de usuario
        //@todo: cambiar password

        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $userUpdate=Request::all();
        $user=User::find($id);
        $user->update($userUpdate);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
}
