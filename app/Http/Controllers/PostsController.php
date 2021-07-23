<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
       // \App\Models\Post::create($data);

        //dd(request()->all());
        return redirect('/profile/'. auth()->user()->id);
    }
}
