@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($posts as $post)
    <div class="row pt-4 pb-4">
        <div class="col-6 offset-3 pt-4 border border-rounded">
            <img src="{{ $post->user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="max-width: 40px;">
            <a href="/profile/{{$post->user->id}}"> <span class="font-weight-bold">{{$post->user->username}}</span> </a>
            <span class="text-dark"> : {{$post->caption}}</span>
            <hr>
            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            <a href="/p/{{$post->id}}"><button class="btn btn-primary">View Post</button></a>

        </div>
    </div>
    @endforeach

<!-- pagination -->
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection
