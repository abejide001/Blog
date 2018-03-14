@extends('layouts.app')

@section('content')
    @include('layouts.error')
    <h2>Create User</h2>
    <div class="panel-body">
        <form method="POST" action="{{route('users.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="tag">Name</label>
                <input type="text" name="name" class="form-control">

            </div>
            <div class="form-group">
                <label for="tag">User Email</label>
                <input type="email" name="email" class="form-control">

            </div>
            <div class="form-group">
                <label for="tag">Password</label>
                <input type="password" name="password" class="form-control">

            </div>
            <button class="btn btn-success" type="submit">
               Add user
            </button>
        </form>
    </div>
    </div>
@stop