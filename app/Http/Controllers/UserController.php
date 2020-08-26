<?php

namespace YourSPACE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use YourSPACE\User;
use YourSPACE\Role;

class UserController extends Controller
{

    public function profile(User $user){
        return view('users/profile', compact('user'));
    }
    public function editProfile(){
        return view('users/editprofile');
    }

    public function profileStore(User $user, Request $request){
        $this->validate(request(), [
            'about' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $user = $user->whereKey(Input::get('id'))->first();

        $user->about = Input::get('about');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage\userpics');
            $image->move($destinationPath, $name);
            $user->image = $name;
        }

        $user->save();

        Session()->flash('message', 'Profile Updated!');
        Session()->flash('alert-class', 'alert-success');

        return redirect('/editprofile');
    }

    public function adminStore(User $user){
        $pmod = Role::where('slug', 'post-moderator')->first();
        $tman = Role::where('slug', 'theme-manager')->first();
        $admin = Role::where('slug', 'admin')->first();

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->email = Input::get('email');
        $user->name = Input::get('name');
        //$user->usergroup = Input::get('usergroup');

        if( Input::get('post-moderator', false)) {

            if(!$user->isPostModerator()) {
                $user->roles()->attach($pmod);
            }
        }
        else{
            if($user->isPostModerator()) {
                $user->roles()->detach($pmod);
            }
        }

        if( Input::get('theme-manager', false)) {

            if(!$user->isThemeManager()) {
                $user->roles()->attach($tman);
            }
        }
        else{
            if($user->isThemeManager()) {
                $user->roles()->detach($tman);
            }
        }

        if( Input::get('admin', false)) {

            if(!$user->isAdministrator()) {
                $user->roles()->attach($admin);
            }
        }
        else{
            if($user->isAdministrator()) {
                $user->roles()->detach($admin);
            }
        }

        $user->updated_by = Auth::user()->id;

        if(!empty(Input::get('password'))) {
            $user->password = bcrypt(Input::get('password'));
        }

        $user->save();

        Session()->flash('message', 'User Updated!');
        Session()->flash('alert-class', 'alert-success');

        return redirect('/admin/manageusers');
    }
}
