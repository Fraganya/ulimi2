<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Feed;

class FeedController extends Controller
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

        return view('feeds')->with([
            'feeds'=>Feed::simplePaginate(15),
            'c_page'=>"feeds"
        ]);
    }

    public function store(Request $request)
    {
        if($request->input('web_access')){
            \Session::flash('target-window',"#create-feed-window");

            $this->validate($request,[
                'title'=>'required|string',
                'content'=>'required',
                'sample_picture'=>'required|file',
                'language'=>'nullable',
                'feed_category_id'=>'required',
                'user_id'=>'required'
            ]);
        }
        else{
            $validator=Validator::make($request->all(),[
                'title'=>'required|string',
                'content'=>'required',
                'sample_picture'=>'required|file',
                'language'=>'nullable',
                'feed_category_id'=>'required',
                'user_id'=>'required'
            ]);


            if($validator->fails()){
                return 'validation failed';
            }
        }


        $feed=Feed::create($request->all());

        if($request->file('sample_picture')){
            $feed->sample_picture = $request->file('sample_picture')->store('feed_samples');
        }

        if(empty($feed->save()))
        {
            if($request->input('web_access')){
                return view('status')->with([
                    'status'=>json_encode(['status'=>'false','message'=>"Feed could not be Saved"]),
                    'c_page'=>"status"
                ]);
            }
            return json_encode(['status'=>'false','message'=>"Feed Saved"]);
        }

        if($request->input('web_access')){
            return view('status')->with([
                'status'=>json_encode(['status'=>'true','message'=>"Feed saved successfully",'feed'=>$feed]),
                'c_page'=>"status"
            ]);
        }

        return json_encode(['status'=>'true','message'=>"Feed Save successful",'feed'=>$feed]);
    }

    public function remove($id)
    {
        $feed=Feed::findOrFail($id);

        if(empty($feed->delete())){
            return view('status')->with(['status'=>"Something went wrong and could not delete feed", 'c_page' => 'status']);
        }

        return view('status')->with(['status'=>"The feed was successfully deleted", 'c_page' => 'status']);
    }
 }
