@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Profile -
                        <a href="/controlpanel">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        @if ($flash = session('message'))
                            <div id="flash-message" class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                {{ $flash }}
                            </div>
                        @endif

                        <h2>
                            {{Auth::user()->name}}'s Profile
                        </h2>
                        <form enctype="multipart/form-data" method="POST" action="">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{Auth::user()->id}}">

                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="about">About Me</label>
                                <input type="text" class="form-control" id="about" name="about" value="{{Auth::user()->about}}">
                            </div>
                            <div class="form-group" style="width: 50%; margin: 0 auto; margin-bottom: 10px;">
                                <label for="image">Profile Picture</label>
                                <input name="image" type="file" id="image">
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