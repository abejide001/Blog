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
        {{--<th>--}}
            {{--Editing--}}
        {{--</th>--}}
        <th>
            Restore
        </th>
        <th>
            Delete
        </th>
        </thead>
        <tbody>
        @if(count($posts)> 0)
        @foreach($posts as $post)
            <tr>
                <td>
                    <img class="img-rounded" src="{{$post->featured}}" width="100px" height="70px"/>
                </td>
                <td>
                    {{$post->title}}
                </td>
                {{--<td>--}}
                    {{--Edit--}}
                {{--</td>--}}
                <td>
                    <a href="{{route('posts.restore', ['id'=>$post->id])}}" class="btn btn-success">Restore</a>
                </td>
                <td>
                    <a href="{{route('posts.kill', ['id'=>$post->id])}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
            @else
                <tr>
                    <td cols="5">No trash post</td>
                </tr>
            @endif
        </tbody>
    </table>
@stop