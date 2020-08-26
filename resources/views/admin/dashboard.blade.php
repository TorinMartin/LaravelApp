@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin CP-
                        <a href="{{ url()->previous() }}">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>
                            Admin Control Panel
                        </h2>
                        <ul>
                            <li>
                                <a href="admin/manageusers">Manage Users</a>
                            </li>
                            <li>
                                <a href="/themes">Manage Themes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
