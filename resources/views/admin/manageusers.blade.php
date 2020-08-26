@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Users-
                        <a href="/admin">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        @if ($flash = session('message'))
                            <div id="flash-message" class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                {{ $flash }}
                            </div>
                        @endif

                        <h2>
                            Admin - Manage Users
                        </h2>

                        @include('admin.search')
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                        @include('admin.user')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection