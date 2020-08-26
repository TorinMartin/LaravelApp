<?php

namespace YourSPACE\Http\Controllers;
use YourSPACE\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use YourSPACE\Repositories\Themes;
use YourSPACE\Theme;
use Illuminate\Support\Facades\Input;

class themeController extends Controller
{
    public function __construct()
    {
        $this->middleware('thememanager')->except(['change']);
    }
    public function themeDashboard(Themes $themes)
    {
        $themes = $themes->all();
        return view('themes/manage', compact('themes'));
    }
    public function create(){
        return view('themes/create');
    }
    public function edit(Theme $theme){
        return view('themes/edit', compact('theme'));
    }
    public function update(Theme $theme){

        $theme->name = Input::get('name');
        $theme->cdn_url = Input::get('cdn_url');

        if( Input::get('default', false)) {
            if (Theme::where('is_default', '=', 1)->count() > 0) {
                /*Session()->flash('message', 'Default Theme Already Set');
                Session()->flash('alert-class', 'alert-danger');

                return redirect('/themes');*/
                $oldDef = Theme::where('is_default', '=', 1)->first();
                $oldDef->is_default = 0;
                $theme->is_default = 1;
                $oldDef->save();
            }
            else{
                $theme->is_default = 1;
            }
        }
        else {
            $theme->is_default = 0;
        }

        $theme->save();

        Session()->flash('message', 'Theme Updated!');
        Session()->flash('alert-class', 'alert-success');

        return redirect('/themes');
    }

    public function delete(Theme $theme){
        if($theme->is_default == 1 || $theme->id == 1){
            Session()->flash('message', 'Cannot Delete Default/MAIN Theme!');
            Session()->flash('alert-class', 'alert-danger');
        }
        else {

            $theme->delete();

            Session()->flash('message', 'Theme Deleted!');
            Session()->flash('alert-class', 'alert-success');

        }

        return redirect('/themes');
    }

    public function store(Theme $theme){
        $this->validate(request(), [
            'name' => 'required',
            'cdn_url' => 'required',
        ]);

        $theme->name = Input::get('name');
        $theme->cdn_url = Input::get('cdn_url');

        if( Input::get('default', false)) {
            if (Theme::where('is_default', '=', 1)->count() > 0) {
                Session()->flash('message', 'Default Theme Already Set');
                Session()->flash('alert-class', 'alert-danger');

                return redirect('/themes');
            }
            else{
                $theme->is_default = 1;
            }
        }
        else {
            $theme->is_default = 0;
        }

        $theme->save();

        Session()->flash('message', 'Theme Created!');
        Session()->flash('alert-class', 'alert-success');

        return redirect('/themes');
    }
    public function change(Theme $theme){

        $theme = $theme->whereKey(Input::get('theme'))->first();

        $cookie = cookie('theme', $theme->cdn_url);
        $cookie2 = cookie('id', $theme->id);

        return redirect('/')->withCookie($cookie)->withCookie($cookie2);

    }
}
