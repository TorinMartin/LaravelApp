<?php

namespace YourSPACE;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name', 'cdn_url', 'is_default'
    ];

    public static function themes(){
        return static::selectRaw('(id) id, (name) name, (cdn_url) cdn_url, (is_default) is_default')
            ->get()
            ->toArray();
    }
}
