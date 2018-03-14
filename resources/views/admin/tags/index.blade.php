@extends('layouts.app')

@section('content')
    <table class="table table-condensed">
        <thead>
        <th>
            Tag name
        </th>
        <th>
            Editing
        </th>
        <th>
            Deleting
        </th>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>
                    {{$tag->tag}}
                </td>
                <td>
                    <a href="{{route('tags.edit',['id'=>$tag->id])}}" class="btn btn-xs btn-info">
                        <span class="glyphicon glyphicon-pencil">Edit</span>
                    </a>
                </td>
                <td>
                    <a href="{{route('tags.delete',['id'=>$tag->id])}}" class="btn btn-xs btn-danger">
                        <span class="glyphicon glyphicon-pencil">Delete</span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop