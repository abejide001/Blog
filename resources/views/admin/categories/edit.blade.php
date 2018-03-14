@extends('layouts.app')

@section('content')
    @include('layouts.error')
    <h2>Update Category</h2>
    <div class="panel-body">
        <form method="POST" action="{{route('category.update',['id'=>$categories->id])}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="name" class="form-control" value="{{$categories->name}}">

            </div>
            <button class="btn btn-success" type="submit">
                Update Category
            </button>
        </form>
    </div>
    </div>
@stop