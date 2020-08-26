@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        {{$user->name}}'s Profile -
                        <a href="{{ url()->previous() }}">Back</a>
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

                        <div style="margin-bottom: 5px;">
                            <img src="/storage/userpics/{{$user->image}}" alt="image" style="max-width: 150px; max-height: 150px;">
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>About Me</th>
                                <th>Roles</th>
                            </tr>
                            </thead>
                            <tbody>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->about}}</td>
                                <td>
                                    @if($user->isAdministrator())
                                        <span style="color: red;">Administrator</span>
                                    @endif
                                    @if($user->isPostModerator())
                                            <span style="color: orange;">Post Moderator</span>
                                    @endif
                                    @if($user->isThemeManager())
                                            <span style="color: blue;">Theme Manager</span>
                                    @endif

                                </td>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
