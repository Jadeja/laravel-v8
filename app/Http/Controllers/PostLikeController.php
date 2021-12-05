<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Mail\Postliked;
use Illuminate\Support\Facades\Mail;



class PostLikeController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post){

        if($post->likedBy($request->user())){
            return response(null,409);
        }

        $post->likes()->create([
            'user_id' =>  $request->user()->id,
        ]);

        $user = auth()->user();
        if(!$post->likes()->onlyTrased()->where('user_id',$request->user()->id)->count())
        {
            Mail::to($post->user())->send(new PostLiked($user,$post));
        }

        return back();
    }

    public function destroy(Request $request, Post $post){
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
