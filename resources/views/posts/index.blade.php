@extends('layouts.main')

@section('title', 'All posts')

@section('content')
    <hr />
    <a style="color:green;" href="{{ route('posts.create') }}">Create</a>
    <hr />
    @if($posts->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts available</p>
    @endif
@endsection