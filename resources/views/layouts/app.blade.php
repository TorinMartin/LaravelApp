<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'YourSPACE') }}</title>

    <!-- Styles -->
    @if (Cookie::get('theme') !== null)
        @if (Cookie::get('id') == 1)
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @else
            <link href="{{Cookie::get('theme')}}" rel="stylesheet">
        @endif
    @else
        @if(!empty($deftheme))
            <link href="{{$deftheme['cdn_url']}}" rel="stylesheet">
        @else
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @endif

    @endif


    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

    @yield('script')
</head>
<body>
<div id="wrapper" class="toggled">

    <!-- Sidebar https://startbootstrap.com/template-overviews/simple-sidebar/-->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="/">
                    YourSPACE
                </a>
            </li>
            @if (Auth::guest())
                <li>
                    <a href="/login">Login</a>
                </li>
                <li>
                    <a href="/register">Register</a>
                </li>
            @else
                <li>
                    <a href="/posts/create">Create Post</a>
                </li>
                <li>
                    <a href="/controlpanel">Control Panel</a>
                </li>
                @if (Auth::user()->isAdministrator())
                    <li>
                        <a href="/admin">Admin Control Panel</a>
                    </li>
                @endif
                @if (Auth::user()->isThemeManager())
                    <li>
                        <a href="/themes">Theme Control Panel</a>
                    </li>
                @endif
                @if (Auth::user()->isPostModerator())
                    <li>
                        <a href="/moderator">Moderator Control Panel</a>
                    </li>
                @endif
                <li style="margin-top: 4em;">
                    <form method="POST" action="/changetheme">
                        {{ csrf_field() }}
                        <label>Theme: </label>
                        <select name="theme" style="color: #000;" onchange="this.form.submit()">
                            @foreach ($themes as $theme)
                                @if (Cookie::get('id') !== null)
                                    @if(Cookie::get('id') == $theme['id'])
                                        <option selected="selected" value="{{$theme['id']}}">{{$theme['name']}}</option>
                                    @else
                                        <option value="{{$theme['id']}}">{{$theme['name']}}</option>
                                    @endif
                                @else
                                    @if ($deftheme['id'] == $theme['id'])
                                        <option selected="selected" value="{{$theme['id']}}">{{$theme['name']}}</option>
                                    @else
                                        <option value="{{$theme['id']}}">{{$theme['name']}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </form>
                </li>
            @endif

        </ul>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->

        <div class="container-fluid">
            <div id="app">
                <nav class="navbar navbar-default navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">

                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Branding Image -->
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'YourSPACE') }}
                            </a>
                        </div>

                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                &nbsp;
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            @if (Auth::user()->isAdministrator())
                                                <li>
                                                    <a href="/admin">Admin Control Panel</a>
                                                </li>
                                            @endif
                                            @if (Auth::user()->isThemeManager())
                                                <li>
                                                    <a href="/themes">Theme Control Panel</a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="/user/{{Auth::user()->id}}">View Profile</a>
                                            </li>
                                            <li>
                                                <a href="/controlpanel">Control Panel</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>

                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>

                @yield('content')
            </div>

            <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}"></script>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>
