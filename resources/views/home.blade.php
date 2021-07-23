@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/profile.JPG" alt="logo" class="w-100 rounded-circle">
        </div>
        <div class="col-9 p-5">

            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <!-- double curly braces is also called mustache syntax usually used as a react js developer -->
                    <h1>{{ $user->username }}<h1>
                </div>

                <a href="/p/create" class="btn btn-primary">Add new Post</a>

            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>127K</strong>posts</div>
                <div class="pr-5"><strong>24K</strong>followers</div>
                <div class="pr-5"><strong>300</strong>following</div>
            </div>

            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row">

     @foreach($user->posts as $post)
        <div class="col-4">
            <img src="/storage/{{$post->image}}" alt="post" class="w-100">
        </div>
     @endforeach

    </div>
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
