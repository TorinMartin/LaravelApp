<?php

namespace YourSPACE\Http\Controllers;
use YourSPACE\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function adminDashboard()
    {
        return view('admin/dashboard');
    }
    public function manageusers(){

        $users = User::all();
        return view('admin/manageusers', compact('users'));
    }
    public function edituser(\YourSPACE\User $user){
        return view('admin/edituser', compact('user'));
    }
    public function deleteuser(\YourSPACE\User $user){
        if($user->isAdministrator()){
            Session()->flash('message', 'Could not delete user!');
            Session()->flash('alert-class', 'alert-danger');
        }
        else {
            $user->deleted_by = Auth::user()->id;
            $user->save();
            $user->delete();

            Session()->flash('message', 'User Deleted!');
            Session()->flash('alert-class', 'alert-success');

        }

        return redirect('/admin/manageusers');
    }
}
