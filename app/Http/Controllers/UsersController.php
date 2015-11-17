<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Request;
use App\Http\Requests;
use App\User;
use Auth;
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
        $zones_array = array();
        $timestamp = time();
        foreach(timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }

        return view('users.create', compact('zones_array'));
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
        $timezone = Input::get('timezone');

        $user = User::where("email", "=", $email)->first();

        if($user == null){
            $newUser = new User;
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->password = bcrypt("123456");
            $newUser->role = $role;
            $newUser->timezone = $timezone;
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
            //return redirect('users');
            return $newUser;

        }else{
            return redirect('users/create')->with('error', ' USER EXISTS')
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
        $name = trim(Input::get('name'));
        $current_password = trim(Input::get('last-pass'));
        $password = Input::get('pass');
        $password2 = Input::get('pass2');

        if(Auth::user()->role != "user") {
            $timezone = Input::get('timezone');
        }

        $user = User::where("id", "=", $id)->first();

        if(($current_password != "" && $password != "" && $password2 != "")){
            //change password
            if (strlen($current_password) > 0 && !Hash::check($current_password, $user->password)) {
                return Redirect::back()->with('error', ' PLEASE SPECIFY THE CORRECT CURRENT PASSWORD');
            }else{
                if($password == $password2) {
                    User::where('id', '=', $id)->update(['password' => bcrypt($password)]);
                    return redirect('');
                    //return User::where("id", "=", $id)->first();

                }else {
                    return Redirect::back()->with('error', ' PASSWORDS DON´T MATCH');
                }
            }
        }

        //change name
        if($user->name != $name){
            User::where('id', '=', $id)->update(['name' => $name]);
            return redirect('');
        }

        //change timezone
        if(Auth::user()->role != "user") {
            if($user->timezone != $timezone){
                User::where('id', '=', $id)->update(['timezone' => $timezone]);
                return redirect('');
            }
        }

        return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::where("id", "=", $id)->first();

        User::find($id)->delete();

        if($user->role == "superadmin") {
            return redirect('users');
        }else{
            return redirect('/');
        }
    }

    /*
     * Recibir mensaje de contacto
     */
    public function contact(){
        $message = Request::all();
        Contact::create($message);

        /*$contact = new Contact();
        $contact->sender_name = Input::get('name');
        $contact->sender_email = Input::get('email');;
        $contact->type = Input::get('type');;
        $contact->message = Input::get('message');;
        $contact->save();*/

        return $message;//redirect('books');
    }


}
