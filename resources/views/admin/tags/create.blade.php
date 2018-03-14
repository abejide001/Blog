@extends('layouts.app')

@section('content')
    @include('layouts.error')
    <h2>Create Tag</h2>
    <div class="panel-body">
        <form method="POST" action="{{route('tags.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" name="tag" class="form-control">

            </div>
            <button class="btn btn-success" type="submit">
                Store Tag
            </button>
        </form>
    </div>
    </div>
@stop