@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="#" class="btn btn-success" style="float: left;">New Post</a>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Post
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        <h1>Create a Post</h1>
                        <hr>
                        <form method="POST" action="/posts">
                            {{ csrf_field() }}
                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="text" name="title" >
                            </div>
                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="body">Body</label>
                                <textarea id="body" name="body" class="form-control" ></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>

                        @include ('layouts.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection