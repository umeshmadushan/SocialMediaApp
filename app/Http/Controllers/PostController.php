<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class PostController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(),[

            'title'=>'required',
            'description' => 'required',
            'thumbnail' => 'required|image'
        ]);

        if($validator->fails()){
            return back()->with('status','Something went wrong!');
        }
        else{

            $imageName =time() . "." . $request->thumbnail->extension();

            $request->thumbnail->move(public_path($path ='thumbnails'),$imageName);

            Post::create([
                'user_id'=>auth()->user()->id,
                'title'=>$request->title,
                'description'=>$request->description,
                'thumbnail'=> $imageName
            ]);
        }

            // Post::create([
            //         'user_id'=>auth()->user()->id,
            //         'title'=>$request->title,
            //         'description'=>$request->description
            //     ]);

        return redirect(route('posts.all'))->with('status','Post created Successfully!');



    }

    public function show($postId){

        $post = Post::findOrFail($postId);

        return view('posts.show',compact('post'));

    }

    public function edit($postId){
        $post = Post::findOrFail($postId);
        return  view('Posts.edit',compact('post'));
    }

    public function update($postId, Request $request){
        Post::findOrFail($postId)->update($request->all());
        $posts = Post::where('user_id', Auth::user()->id)->get();

        return redirect(route('posts.all'))->with('status','Post Updated!');

    }

    public function delete($postId){
        Post::findOrFail($postId)->delete();

        return redirect(route('posts.all'))->with('status','Post Deleted!');
    }

}
