@extends('layouts.app')

@section('content')
    @include('layouts.error')
    <h2>Update tag</h2>
    <div class="panel-body">
        <form method="POST" action="{{route('tags.update',['id'=>$tags->id])}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="tag" class="form-control" value="{{$tags->tag}}">

            </div>
            <button class="btn btn-success" type="submit">
                Update Tag
            </button>
        </form>
    </div>
    </div>
@stop