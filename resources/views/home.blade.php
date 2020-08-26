@extends('layouts.app')

@section('script')
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{ asset('js/update.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="/posts/create" class="btn btn-success" style="float: left;">New Post</a>
            </div>
        </div>
    </div>
    <br />
    @if ($flash = session('message'))
        <div id="flash-message" class="alert {{ Session::get('alert-class', 'alert-info') }}" style="width: 250px; margin: 0 auto; margin-bottom: 10px; text-align: center;" role="alert">
            {{ $flash }}
        </div>
    @endif

    <div id="posts"></div>


@endsection
