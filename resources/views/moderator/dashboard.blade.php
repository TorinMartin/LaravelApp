@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Moderator CP-
                        <a href="{{ url()->previous() }}">Back</a>
                    </div>

                    <div class="panel-body" style="text-align: center;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>
                            Moderator Control Panel
                        </h2>
                        Coming Soon
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
