<?php

namespace YourSPACE\Http\Controllers;

use Illuminate\Http\Request;
use YourSPACE\Post;
use YourSPACE\Repositories\Posts;
use YourSPACE\Repositories\Themes;
use YourSPACE\Theme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts)
    {
        $posts = $posts->all()->sortByDesc("created_at");

        return view('home', compact('posts'));
    }
    public function controlPanel(){
        return view('controlpanel');
    }
}
