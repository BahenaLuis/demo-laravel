@extends('layouts.admin')

@section('content')

    @if (Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session:: get('info') }}</p>
            </div>
        </div>
    @endif

    <a href="{{ route('admin.create') }}">Create a post</a>
    <br>

    <h1>I'm the admin index</h1>    
    <br>
    
    @foreach ($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <h1 class="post-title">{{ $post->title }}</h1>
            <a href="{{ route('admin.edit', ['id' => $post->id ]) }}">Edit a post</a>    
            <a href="{{ route('admin.remove', ['id' => $post->id ]) }}">Remove a post</a>
        </div>
    </div>    
    @endforeach
    
@endsection