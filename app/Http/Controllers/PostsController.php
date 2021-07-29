<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->paginate(3);
        return view('posts.index', compact('posts'));
        //dd($users);
    }

    public function create()
    {
        // this goes to view folder to post to create.blade.php
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' =>['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}")) -> resize(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

       // \App\Models\Post::create($data);

        //dd(request()->all());
        return redirect('/profile/'. auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        //dd($post);
        return view('posts.show', compact('post'));
    }
}
