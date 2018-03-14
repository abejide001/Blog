@extends('layouts.app')

@section('content')
    @include('layouts.error')
    <h2>Create User</h2>
    <div class="panel-body">
        <form method="POST" action="{{route('settings.update')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="tag">Site Name</label>
                <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">

            </div>
            <div class="form-group">
                <label for="tag">contact number</label>
                <input type="number" name="contact_number" value="{{$settings->contact_number}}" class="form-control">

            </div>
            <div class="form-group">
                <label for="tag">contact email</label>
                <input type="email" name="contact_email" value="{{$settings->contact_email}}" class="form-control">

            </div>
            <div class="form-group">
                <label for="tag">address</label>
                <input type="text" name="address" value="{{$settings->address}}"class="form-control">

            </div>
            <button class="btn btn-success" type="submit">
               Update Settings
            </button>
        </form>
    </div>
    </div>
@stop