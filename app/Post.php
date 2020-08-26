<?php
namespace YourSPACE;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title', 'body', 'deleted_by', 'updated_by'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}