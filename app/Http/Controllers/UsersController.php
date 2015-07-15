<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
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
        $name = trim(Input::get('name'));
        $email = trim(Input::get('email'));
        $role = trim(Input::get('role'));

        $user = User::where("email", "=", $email)->first();
        //$user = Request::all();

        if($user == null){
            $newUser = new User;
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = bcrypt("123456");
            $newUser->role = $role;
            $newUser->save();

            //profile picture
            /*$url = Input::get('URL');

            $user = User::where("email", "=", Input::get('email'))->first();
            $owner_id =$user->id;

            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $filename = $owner_id.'.'. $extension; //photo of a user beginning with "u"

            //get file content from url
            $file = file_get_contents($url);
            $save = file_put_contents('users_photos/'.$filename, $file);

            if($save){
                try {
                    //return var_dump('file downloaded to images folder and saved to database as well.......');
                } catch (Exception $e) {
                    //delete if no db things........
                    File::delete('users_photos/'. $filename);
                    //return var_dump('filenot downloaded.......');
                }
            }*/
            return redirect('users');
            //return $user;

        }else{
            return redirect('users/create')->with('error', 'USER EXISTS')
                                             ->with('name', $name)
                                             ->with('email', $email);
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
        $user=User::find($id);
        return view('users.show',compact('user'));
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
