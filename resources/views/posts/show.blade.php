@extends('layouts.main')

@section('title', $post->title)

@section('content')
<hr />
<a style="color:blue;" href="{{ route('posts.index') }}">All</a> | <a style="color:green;" href="{{ route('posts.edit', $post->id) }}">Edit</a> | <a style="color:red;" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('post-{{ $post->id }}').submit();">Delete</a>
<hr />
<h1>{{ $post->title }}</h1>
<p><strong>{{ $post->author }}</strong></p>
<div>{{ $post->body }}</div>

<form id="post-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
@endsection