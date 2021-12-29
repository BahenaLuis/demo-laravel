@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <h1>I'm a section for create a new post</h1>
    <form action="{{ route('admin.create') }}" method="post">
        <div class="form-group">
            <label type="text" for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
        </div>
        <div class="form-group">
            <label type="text" for="title">Content</label>
            <input type="text" class="form-control" id="content" name="content" >
        </div>
        @foreach($tags as $tag)
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}
                </label>
            </div>
        @endforeach
        {{ csrf_field() }}
        <button type="submit">Submit</button>
    </form>
@endsection