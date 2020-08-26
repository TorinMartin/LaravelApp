@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="themes/create" class="btn btn-success" style="float: left;">Create</a>
            </div>
        </div>
    </div>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Theme - <a href="/themes">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        <h1>Edit Theme</h1>
                        <hr>
                        <form method="POST" action="">
                            {{ csrf_field() }}
                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$theme->name}}">
                            </div>
                            <div class="form-group" style="width: 50%; margin: 0 auto; margin-bottom: 10px;">
                                <label for="cdn_url">cdn_url</label>
                                <input type="text" class="form-control" id="cdn_url" name="cdn_url" value="{{$theme->cdn_url}}">
                            </div>
                            <div class="form-group">
                                <label for="usergroup">Default Theme</label><br/>
                                <input type="checkbox" name="default" value="default" @if($theme->is_default == 1) checked="checked" @endif >
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>

                        @include ('layouts.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection