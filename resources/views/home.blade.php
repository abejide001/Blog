@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    Published
                </div>
                <div class="panel-body text-center">
                    {{$post}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading text-center">
                    Published
                </div>
                <div class="panel-body text-center">
                    222
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    Published
                </div>
                <div class="panel-body text-center">
                    222
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    Published
                </div>
                <div class="panel-body text-center">
                    222
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
