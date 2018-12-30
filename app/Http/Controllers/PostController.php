<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Post;

class PostController extends Controller
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

        return view('posts')->with([
            'posts'=>Post::simplePaginate(15),
            'c_page'=>"posts"
        ]);
    }

    public function store(Request $request)
    {
        if($request->input('web_access')){
            \Session::flash('target-window',"#create-post-window");

            $this->validate($request,[
                'content'=>'required',
                'picture'=>'nullable',
                'category'=>'nullable',
                'user_id'=>'required'
            ]);
        }
        else{
            $validator=Validator::make($request->all(),[
                'content'=>'required',
                'picture'=>'nullable',
                'category'=>'nullable',
                'user_id'=>'required'
            ]);


            if($validator->fails()){
                return 'validation failed';
            }
        }


        $post=Post::create($request->all());

        if(empty($post->save()))
        {
            if($request->input('web_access')){
                return view('status')->with([
                    'status'=>json_encode(['status'=>'false','message'=>"Post could not be Saved"]),
                    'c_page'=>"status"
                ]);
            }
            return json_encode(['status'=>'false','message'=>"Post Saved"]);
        }

        if($request->input('web_access')){
            return view('status')->with([
                'status'=>json_encode(['status'=>'true','message'=>"Post saved successfully",'post'=>$post]),
                'c_page'=>"status"
            ]);
        }

        return json_encode(['status'=>'true','message'=>"Post Save successful",'post'=>$post]);
    }

    public function remove($id)
    {
        $post=Post::findOrFail($id);

        if(empty($post->delete())){
            return view('status')->with(['status'=>"Something went wrong and could not delete post", 'c_page' => 'status']);
        }

        return view('status')->with(['status'=>"The post was successfully deleted", 'c_page' => 'status']);
    }

    public function latest()
    {
        $posts=Post::orderBy('created_at','desc')->get();
        $authors=[];

        foreach($posts as $post){
            $authors[]=$post->user;
        }

        return json_encode(['posts'=>$posts,'authors'=>$authors]);
    }
}
