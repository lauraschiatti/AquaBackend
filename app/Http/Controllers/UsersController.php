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
        $zones_array = array();
        $timestamp = time();
        foreach(timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }

        $zones = timezone_identifiers_list();

        foreach ($zones as $zone)
        {
            $zoneExploded = explode('/', $zone); // 0 => Continent, 1 => City

            // Only use "friendly" continent names
            if ($zoneExploded[0] == 'Africa' || $zoneExploded[0] == 'America' || $zoneExploded[0] == 'Antarctica' || $zoneExploded[0] == 'Arctic' || $zoneExploded[0] == 'Asia' || $zoneExploded[0] == 'Atlantic' || $zoneExploded[0] == 'Australia' || $zoneExploded[0] == 'Europe' || $zoneExploded[0] == 'Indian' || $zoneExploded[0] == 'Pacific')
            {
                if (isset($zoneExploded[1]) != '')
                {
                    $area = str_replace('_', ' ', $zoneExploded[1]);

                    if (!empty($zoneExploded[2]))
                    {
                        $area = $area . ' (' . str_replace('_', ' ', $zoneExploded[2]) . ')';
                    }

                    $locations[$zoneExploded[0]][$zone] = $area; // Creates array(DateTimeZone => 'Friendly name')
                }
            }
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
