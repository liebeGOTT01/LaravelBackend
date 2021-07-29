@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

        <div class="col-8 offset-2">
            <div class="row">
                <h1>Edit profile</h1>
            </div>
            <div class="form-group row">
                <label for="">title</label>
                <input
                    type="text"
                    id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ $user->profile->title}}"
                    value="{{ old('title') }}"
                    autocomplete="title" autofocus>

                    @error('title')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
            </div>

            <div class="form-group row">
                <label for="">description</label>
                <textarea name="description" id="" cols="10" rows="5"
                    class="form-control @error('title') is-invalid @enderror"
                    value=""
                    autocomplete="caption" autofocus>{{ old('description') ?? $user->profile->description }}</textarea>

                    @error('caption')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
            </div>

            <div class="form-group row">
                <label for="">URL</label>
                <input
                    type="text"
                    id="url"
                    class="form-control @error('url') is-invalid @enderror"
                    name="url"
                    value="{{ old('url') ?? $user->profile->url }}"
                    autocomplete="url" autofocus>

                    @error('url')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
            </div>

            <div class="row">
                <label for="image"> Find Image </label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
                @error('image')
                    <strong>{{ $message }}</strong>
                @enderror

            <div class="row pt-4">
                <button type="submit" class="btn btn-primary">Update profile</button>
            </div>
        </div>
    </form>
</div>
@endsection
