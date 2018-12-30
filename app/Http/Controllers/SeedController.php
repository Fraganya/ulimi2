<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Seed;

class SeedController extends Controller
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

        return view('seeds')->with([
            'seeds'=>Seed::simplePaginate(15),
            'c_page'=>"seeds"
        ]);
    }

    public function store(Request $request)
    {

        if($request->input('web_access')){
            \Session::flash('target-window',"#create-seed-window");

            $this->validate($request,[
                'title'=>'required|string',
                'content'=>'required',
                'sample_picture'=>'required|file',
                'language'=>'nullable',
                'seed_category_id'=>'required',
                'user_id'=>'required'
            ]);
        }
        else{
            $validator=Validator::make($request->all(),[
                'title'=>'required|string',
                'content'=>'required',
                'sample_picture'=>'required|file',
                'language'=>'nullable',
                'seed_category_id'=>'required',
                'user_id'=>'required'
            ]);


            if($validator->fails()){
                return 'validation failed';
            }
        }


        $seed=Seed::create($request->all());

        if($request->file('sample_picture')){
            $seed->sample_picture = $request->file('sample_picture')->store('seed_samples');
        }


        if(empty($seed->save()))
        {
            if($request->input('web_access')){
                return view('status')->with([
                    'status'=>json_encode(['status'=>'false','message'=>"Seed could not be Saved"]),
                    'c_page'=>"status"
                ]);
            }
            return json_encode(['status'=>'false','message'=>"Seed Saved"]);
        }

        if($request->input('web_access')){
            return view('status')->with([
                'status'=>json_encode(['status'=>'true','message'=>"Seed saved successfully",'feed'=>$seed]),
                'c_page'=>"status"
            ]);
        }

        return json_encode(['status'=>'true','message'=>"Seed Save successful",'seed'=>$seed]);
    }

    public function remove($id)
    {
        $seed=Seed::findOrFail($id);

        if(empty($seed->delete())){
            return view('status')->with(['status'=>"Something went wrong and could not delete seed",'c_page' => 'status']);
        }

        return view('status')->with(['status'=>"The seed was successfully deleted",'c_page' => 'status']);
    }
}
