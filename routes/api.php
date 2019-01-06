<?php

use Illuminate\Http\Request;

use \App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('authenticate',"UserController@authenticate");
Route::post('register',function(Request $request){
    //registration via api
    if (User::where('username', $request->username)->first()) {
        return json_encode(['error'=>'true','status' => 'false', 'message' => "Username is already taken"]);
    }



    $validator = Validator::make($request->all(), [
        'username' => 'required|string:unique:users,username',
        'firstname' => 'required',
        'surname' => 'required',
        'specialization' => 'required',
        'number' => 'required|unique:users,phone_number',
        'password'=>"required|string|min:8|max:100"
    ]);

    if ($validator->fails()) {
        return json_encode(['error'=>'true','status' => 'false', 'message' => "Failed to validate your details",'errors'=>$validator->errors()]);
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
        return json_encode(['error'=>'true','status' => 'false', 'message' => "Registration failed"]);
    }

    return json_encode(['error'=>'false','status' => 'true', 'message' => "Registration successful", 'user' => $user]);
});



Route::middleware('auth:api')->get('/posts/latest',"PostController@latest");
Route::middleware('auth:api')->get('/users/{id}',"UserController@get");