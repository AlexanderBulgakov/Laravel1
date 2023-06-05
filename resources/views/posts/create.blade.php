@extends('main')
@section('content')
<hr />
<a style="color:blue;" href="{{ route('posts.index') }}">All</a>
<hr />
@if ($errors->any())
    <ol>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ol>
@endif
<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <label for="title">Title</label>
    <br />
    <input id="title" name="title" type="text" value="{{ old('title') }}" />
    <br />
    <label for="body">Body</label>
    <br />
    <textarea id="body" name="body">{{ old('body') }}</textarea>
    <br />
    <label for="author">Author</label>
    <br />
    <input id="author" name="author" type="text" value="{{ old('author') }}" />
    <br />
    <input type="submit" value="Create">
</form>
@endsection