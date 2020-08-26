@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Post -
                        <a href="/">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>
                            Editing: {{$post->title}}
                        </h2>
                        <form method="POST" action="">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{$post->id}}">

                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                            </div>
                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="body">Body</label>
                                <textarea id="body" name="body" class="form-control">{{$post->body}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                        @include ('layouts.errors')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection