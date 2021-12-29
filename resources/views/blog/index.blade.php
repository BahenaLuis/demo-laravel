@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p clas="quote">This is the main title</p>
            </div>
        </div>
    
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-12">
                <h1 class="post-title">{{ $post->title }}</h1>

                @foreach ($post->tags as $tag)
                    <p>{{ $tag->name }}</p>        
                @endforeach                

                <p>{{ $post->content }}</p>
                <a href="{{  route('blog.post', ['id' => $post->id ]) }}">Read more...</a>
            </div>
        </div>    
        @endforeach        
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}
        </div>
    </div>
    
@endsection