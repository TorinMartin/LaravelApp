@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit {{$user->name}} -
                        <a href="/admin/manageusers">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>
                            {{$user->name}}
                        </h2>
                        <form method="POST" action="">
                            {{ csrf_field() }}
                            <input type="hidden" id="id" name="id" value="{{$user->id}}">

                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                            </div>
                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group" style="width: 50%; margin: 0 auto;">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="usergroup">User Roles</label><br/>
                                <input type="checkbox" name="admin" value="set" @if($user->isAdministrator()) checked="checked" @endif> Admin &emsp;
                                <input type="checkbox" name="theme-manager" value="set" @if($user->isThemeManager()) checked="checked" @endif> Theme Manager &emsp;
                                <input type="checkbox" name="post-moderator" value="set" @if($user->isPostModerator()) checked="checked" @endif> Post Moderator &emsp;
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