<?php

namespace YourSPACE;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'about', 'image', 'usergroup', 'deleted_by', 'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post){
        $this->posts()->save($post);
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles');

    }

    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function isAdministrator() {
        if($this->hasRole('admin') || $this->hasRole('root')){
            return true;
        }
        return false;
    }

    public function isThemeManager() {
        if($this->hasRole('theme-manager')){
            return true;
        }
        return false;
    }

    public function isPostModerator() {
        if($this->hasRole('post-moderator')){
            return true;
        }
        return false;
    }
}
