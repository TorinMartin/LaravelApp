@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Themes -
                        <a href="#">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        @if ($flash = session('message'))
                            <div id="flash-message" class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                {{ $flash }}
                            </div>
                        @endif

                        <h2>
                            Theme Manager
                        </h2>

                        <a href="/themes/create" class="btn btn-success" style="float: left; margin-bottom: 10px;">Create</a>
                            <br /><br />

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($themes as $theme)
                                @include('themes.theme')
                            @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection