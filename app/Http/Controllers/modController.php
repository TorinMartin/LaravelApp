<?php

namespace YourSPACE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class modController extends Controller
{
    public function __construct()
    {
        $this->middleware('postmoderator');
    }
    public function modDashboard()
    {
        return view('moderator/dashboard');
    }
    public function edit(\YourSPACE\Post $post){
        return view('moderator/edit', compact('post'));
    }
    public function delete(\YourSPACE\Post $post){
        $post->deleted_by = Auth::user()->id;
        $post->save();
        $post->delete();

        Session()->flash('message', 'Post Deleted!');
        Session()->flash('alert-class', 'alert-danger');

        return redirect('/');
    }
}
