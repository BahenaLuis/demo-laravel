@extends('layouts.master')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>  
    <p>{{ count($post->likes) }} Likes</p>  
    <a href="{{ route('blog.post.like', ['id' => $post->id]) }}">Give like<a>
@endsection