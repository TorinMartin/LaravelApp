<?php
namespace YourSPACE\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use YourSPACE\Post;
use YourSPACE\Repositories\Posts;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show', 'all']);
    }
    public function index(Posts $posts)
    {
        $posts = $posts->all()->sortByDesc("created_at");
        return view('home', compact('posts'));
    }

    public function all(Posts $posts)
    {
        $posts = $posts->all()->sortByDesc("created_at");
        return view('posts.all', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store(){
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        auth()->user()->publish(
            new \YourSPACE\Post(request(['title', 'body']))
        );
        Session()->flash('message', 'Post Published!');
        Session()->flash('alert-class', 'alert-success');
        return redirect('/');
    }
    public function show(\YourSPACE\Post $post){
        return view('posts.show', compact('post'));
    }
    public function adminStore(Post $post){

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post->title = Input::get('title');
        $post->body = Input::get('body');

        $post->updated_by = Auth::user()->id;

        $post->save();

        Session()->flash('message', 'Post Updated!');
        Session()->flash('alert-class', 'alert-success');

        return redirect('/');
    }
}