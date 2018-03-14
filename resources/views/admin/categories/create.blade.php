@extends('layouts.app')

@section('content')
    @include('layouts.error')
        <h2>Create Category</h2>
        <div class="panel-body">
            <form method="POST" action="{{route('category.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control">

                </div>
                <button class="btn btn-success" type="submit">
                        Store Category
                </button>
            </form>
        </div>
        </div>
    @stop