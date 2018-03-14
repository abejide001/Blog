@extends('layouts.app')

@section('content')
    <table class="table table-condensed">
        <thead>
        <th>
            Image
        </th>
        <th>
            Post title
        </th>
        <th>
            Editing
        </th>
        <th>
            Deleting
        </th>
        </thead>
        <tbody>
        @if(count($posts)> 0)
        @foreach($posts as $post)
            <tr>
                <td>
                  <img src="{{$post->featured}}" width="30%" height="5%">
                </td>
                <td>
                    {{$post->title}}
                </td>
                <td>
                    <a href="{{route('posts.edit', ['id'=>$post])}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                   <a href="{{route('post.delete', ['id'=>$post->id])}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
            @else

            <td>No posts</td>

            @endif
        </tbody>

    </table>
@stop