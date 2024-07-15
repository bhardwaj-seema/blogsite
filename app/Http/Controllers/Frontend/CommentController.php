<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request){

        if (Auth::check()) {
            $validatore = Validator::make($request->all(),[
                'comment_body'=> 'required|string'
            ]);

            if($validatore->fails()){
                return redirect()->back();

            }
            
            $post = Post::where('slug', $request->post_slug)->where('status', '0')->first();
            if($post){
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => auth()->user()->id,
                    'commnet_body' =>$request->comment_body,

                ]);

            }else{
               return redirect()->back()->with('message', ' no such post found');
            }

        }else{
           return redirect()->back();

        }

    }
}
