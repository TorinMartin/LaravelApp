
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span style="font-weight: bold;">{{$post->title}}</span>
                    <p style="display: inline; float: right;">{{ $post->created_at->toFormattedDateString() }}
                        by <a href="/user/{{$post->user->id}}">{{ $post->user->name }}</a></p>
                </div>

                <div class="panel-body" style="text-align: center;">
                    {{ $post->body }}
                    @if (Auth::user() && Auth::user()->isPostModerator())
                        <div style="float: right; margin-top: 2em;">
                            <p style="text-align:center; font-size: small;">Moderation:</p>
                            <a href="moderator/edit/{{$post->id}}" class="btn btn-success" style="">Edit</a>
                            <a href="moderator/delete/{{$post->id}}" class="btn btn-danger" style="">Delete</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
