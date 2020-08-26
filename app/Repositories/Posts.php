<?php
namespace YourSPACE\Repositories;
use YourSPACE\Post;
use YourSPACE\Redis;

class Posts{
    protected $redis;
    public function __construct(Redis $redis){
        $this->redis = $redis;
    }
    public function all(){
        return Post::all();
    }
}