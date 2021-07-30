@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-item-center">
                <div class="pr-3">
                    <img src="{{ $post->user->profile->profileImage() }}" alt="" class="rounded-circle w-100" style="max-width: 40px;">
                </div>
                <div>
                    <h5 class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}"> <span class="text-dark">{{$post->user->username}}</span> </a>
                    </h5>
                </div>
            </div>
            <hr>
            <p>
                <a href="/profile/{{$post->user->id}}"> <span class="text-dark font-weight-bold">{{$post->user->username}}</span> </a>
                <span class="text-dark"> : {{$post->caption}}</span>
            </p>

            <br>
            <h4>Display Comments</h4>

                    <hr />
                    <h4>Add comment</h4>
                    <form action="" method="post"></form>
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
        </div>
    </div>
</div>

@endsection
