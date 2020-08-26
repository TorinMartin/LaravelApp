@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body" style="text-align: center;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>
                            {{Auth::user()->name}}'s Control Panel
                        </h2>

                        <h3>User Controls</h3>
                        <ul>
                            <li>
                                <a href="/editprofile">Update Profile</a>
                            </li>
                            <li>
                                <a href="#">Change Password</a>
                            </li>
                            <li>
                                <a href="#">Change Email</a>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
