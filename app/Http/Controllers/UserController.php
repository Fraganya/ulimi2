<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        return view('users')->with([
            'users' => User::where('id','!=',Auth::user()->id)->simplePaginate(15),
            'c_page'=>"users"
        ]);
    }

    public function authenticate(Request $request)
    {
        $username=$request->input('username');
        $password=bcrypt($request->input('password'));

        $user=User::where('username',$username)->where('password',$password)->first();

        if(empty($user)){
            return json_encode(['status'=>'false','message'=>'Authentication failed']);
        }

        //success
        return json_encode(['status'=>'true','user'=>$user]);
    }

    public function register(Request $request)
    {

        if($request->input('web_access')){
            \Session::flash('target-window',"#create-user-window");

            $this->validate($request,[
                'username' => 'required|string:unique:users,username',
                'firstname' => 'required',
                'surname' => 'required',
                'specialization' => 'required',
                'number' => 'required',
                'password'=>"required|string|min:8|max:100"
            ]);
        }
        else{
            //registration via api
            if (User::where('username', $request->username)->first()) {
                return json_encode(['status' => 'false', 'message' => "Username is already taken"]);
            }


            $validator = Validator::make($request->all(), [
                'username' => 'required|string:unique:users,username',
                'firstname' => 'required',
                'surname' => 'required',
                'specialization' => 'required',
                'number' => 'required',
                'password'=>"required|string|min:8|max:100"
            ]);


            if ($validator->fails()) {
                return json_encode(['status' => 'false', 'message' => "Failed to validate your details"]);
            }
        }

        $user = User::create([
            'username' => $request->input('username'),
            'firstname' => $request->input('firstname'),
            'surname' => $request->input('surname'),
            'type' => ($request->input('type')) ? $request->input('type') : 'standard',
            'specialization' => $request->input('specialization'),
            'phone_number' => $request->input('number'),
            'password' => bcrypt($request->input('password'))
        ]);

        if ($request->input('language')) {
            $user->pref_lang = $request->input('language');
        }

        if (empty($user->save())) {
            if ($request->input('web_access')) {
                return view('status')->with([
                    'status' => json_encode(['status' => 'false', 'message' => "Registration failed"]),
                    'c_page'=>"status"
                ]);
            }
            return json_encode(['status' => 'false', 'message' => "Registration failed"]);
        }

        if ($request->input('web_access')) {
            return view('status')->with([
                'status' => json_encode(['status' => 'true', 'message' => "Registration successful", 'user' => $user]),
                'c_page'=>"status"
            ]);
        }

        return json_encode(['status' => 'true', 'message' => "Registration successful", 'user' => $user]);
    }


    /*
        public function register(Request $request)
        {
            $data=file_get_contents('php://input');
            $data=json_decode($data);

            var_dump($data);
            die();
            $user=User::create([
                'username'=>$data->username,
                'firstname'=>$data->firstname,
                'surname'=>$data->surname,
                'type'=>'standard',
                'specialization'=>$data->specialty,
                'number'=>$data->number,
                'password'=>md5($data->password)
            ]);

            if(empty($user->save()))
            {
                return json_encode(['status'=>'false','message'=>"Registration failed"]);
            }

            return json_encode(['status'=>'true','message'=>"Registration successful",'user'=>$user]);
        }
    */

    public function removeAccount($userID)
    {
        $user = User::findOrFail($userID);

        if (empty($user->delete())) {
            return view('status')->with(['status' => "Something went wrong and could not delete user", 'c_page' => 'status']);
        }

        return view('status')->with(['status' => "The user was successfully deleted",'c_page' => 'status']);
    }

    public function resetPassword($userID)
    {
        $user = User::findOrFail($userID);

        $user->password = bcrypt('@12345678!');
        if (empty($user->update())) {
            return view('status')->with(['status' => "Something went wrong and could not reset password",'c_page' => 'status']);
        }

        return view('status')->with(['status' => "The user password was successfully reset to @12345678!",'c_page' => 'status']);
    }

    public function changePassword(Request $request)
    {
        if($request->input('web_access')){
            \Session::flash('target-window',"#change-password-window");

            $this->validate($request,[
                'password'=>"required|string|confirmed|min:8|max:100"
            ]);
        }
        else{
            //update via api
            $validator = Validator::make($request->all(), [
                'password'=>"required|string|confirmed|min:8|max:100"
            ]);


            if ($validator->fails()) {
                return json_encode(['status' => 'false', 'message' => "Failed to validate your password"]);
            }
        }

        $user = Auth::user();

        $user->password = bcrypt($request->input('password'));
        if (empty($user->update())) {
            if($request->input('web_access')) {
                return view('status')->with(['status' => "Something went wrong and could not reset password", 'c_page' => 'status']);
            }

            return json_encode(['status' => 'false', 'message' => "Something went wrong"]);
        }

        if($request->input('web_access')){
            return view('status')->with(['status' => "The user password was successfully updated!!",'c_page'=>'status']);
        }


        return json_encode(['status' => 'true', 'message' => "Password has been updated"]);

    }

    public function get($id)
    {
        return User::find($id);
    }

}
