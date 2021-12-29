@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <h1>I'm a section for edit a new post</h1>
    <form action="{{ route('update') }}" method="post">
        <div class="form-group">
            <label type="text" for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" >
        </div>
        <div class="form-group">
            <label type="text" for="content">Content</label>
            <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}" >
        </div>
        @foreach($tags as $tag)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                    {{ $post->tags->contains($tag->id) ? 'checked' : '' }}> {{ $tag->name }}
                </label>
            </div>
        @endforeach
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $post->id }}">
        <button type="submit">Submit</button>
    </form>
@endsection