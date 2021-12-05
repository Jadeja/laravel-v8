<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __contruct(){
        $this->middleware('auth')->only(['store','destroy']);
    }

    public function index(){       
       $posts = Post::orderBy('created_at','desc')->with(['likes','user'])->paginate(2);
       return view('posts.index',['posts'=>$posts]);
    }


    public function show(Post $post){
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'body'=>'required'
        ]);

    $request->user()->posts()->create([
            'body'=>$request->body
        ]);

        return redirect()->route('posts');
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }
}
