<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('main', ['posts' => Post::orderBy('created_at')->paginate(5)]);
    }

    // public function anon()
    // {
    //     $posts = Post::where('user_id', null)->get();
    //     dd($posts);
    // }

    public function store(Request $req)
    {
        $post = new Post;
        $post->text = $req->input('text');
        $post->user_id = session()->has('user') ? session('user.id') : null;
        $post->save();

        // if ($req->input('id') == 0) {
        //     $post->user_id = $req->input('id');
        // }
        // else {
        //     $user = User::find(session('user.id'));
        //     $post->user_id = $req->input('id');
        //     $user->posts()->save($post);
        // }
    }
}
