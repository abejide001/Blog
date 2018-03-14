@extends('layouts.app')
@section('styles')
    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    @stop
@section('content')

            @include('layouts.error')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Create a new post</h2>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                                <input type="text" name="title" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="Featured">Featured</label>
                            <input type="file" name="featured" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Select a Tag</label><br/>
                            @foreach($tags as $tag)
                            <label for="tag">{{$tag->tag}}</label>

                            <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label for="Category">Selext category</label>

                            <select id="category_id" name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    

    @stop
@section('scripts')
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote();
    });
</script>
@stop