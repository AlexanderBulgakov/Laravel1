@extends('layouts.main')

@section('title', 'Edit post')

@section('content')
<hr />
<a style="color:blue;" href="{{ route('posts.index') }}">All</a> | <a style="color:blue;" href="{{ route('posts.show', $post->id) }}">Cancel</a>
<hr />
@if ($errors->any())
    <ol>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ol>
@endif
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <label for="title">Title</label>
    <br />
    <input id="title" name="title" type="text" value="{{ $post->title }}" />
    <br />
    <label for="body">Body</label>
    <br />
    <textarea id="body" name="body">{{ $post->body }}</textarea>
    <br />
    <label for="author">Author</label>
    <br />
    <input id="author" name="author" type="text" value="{{ $post->author }}" />
    <br />
    <input type="submit" value="Update">
</form>
@endsection