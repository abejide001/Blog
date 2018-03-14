









@extends('layouts.app')

@section('content')
    @include('layouts.error')
    <h2>Edit User</h2>
    <div class="panel-body">
        <form method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
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
            <div class="form-group">
                <label for="tag">Avatar</label>
                <input type="file" name="avatar" class="form-control">

            </div>
            <div class="form-group">
                <label for="tag">facebook</label>
                <input type="text" name="facebook" class="form-control">

            </div>
            <div class="form-group">
                <label for="tag">youtube</label>
                <input type="text" name="youtube" class="form-control">

            </div>
            <div class="form-group">
                <label for="tag">about</label>
               <textarea class="form-control"></textarea>

            </div>
            <button class="btn btn-success" type="submit">
                Update Profile
            </button>
        </form>
    </div>
    </div>
@stop