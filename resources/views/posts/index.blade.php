<hr />
<a style="color:green;" href="{{ route('posts.create') }}">Create</a>
<hr />
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