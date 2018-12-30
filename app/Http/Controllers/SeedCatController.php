<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

use App\SeedCat;

class SeedCatController extends Controller
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
        return view('seed-categories')->with([
            'categories'=>SeedCat::simplePaginate(15),
            'c_page'=>"seedcat"
        ]);
    }


    public function store(Request $request)
    {
        if($request->input('web_access')){
            \Session::flash('target-window',"#create-seed-cat-window");

            $this->validate($request,[
                'name'=>'required|string:unique:users,username',
                'description'=>'required'
            ]);
        }
        else{
            if(SeedCat::where('name',$request->name)->first()){
                return 'Another category with same name already exists!';
            }


            $validator=Validator::make($request->all(),[
                'name'=>'required|string:unique:users,username',
                'description'=>'required',
            ]);


            if($validator->fails()){
                return 'validation failed';
            }
        }


        $category=SeedCat::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'language'=>$request->input('language'),
        ]);

        if(empty($category->save()))
        {
            if($request->input('web_access')){
                return view('status')->with([
                    'status'=>json_encode(['status'=>'false','message'=>"Seed Category Save failed"]),
                    'c_page'=>"status"
                ]);
            }
            return json_encode(['status'=>'false','message'=>"Save failed"]);
        }

        if($request->input('web_access')){
            return view('status')->with([
                'status'=>json_encode(['status'=>'true','message'=>"Seed Category save successful",'$category'=>$category]),
                'c_page'=>"status"
            ]);
        }

        return json_encode(['status'=>'true','message'=>"Registration successful",'user'=>$category]);
    }

    public function removeCat($catID)
    {
        $cat=SeedCat::findOrFail($catID);

        if(empty($cat->delete())){
            return view('status')->with(['status'=>"Something went wrong and could not delete category", 'c_page' => 'status']);
        }

        return view('status')->with(['status'=>"The category was successfully deleted", 'c_page' => 'status']);
    }


}
