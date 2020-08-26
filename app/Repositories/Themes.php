<?php
namespace YourSPACE\Repositories;
use YourSPACE\Theme;
use YourSPACE\Redis;

class Themes{
    protected $redis;
    public function __construct(Redis $redis){
        $this->redis = $redis;
    }
    public function all(){
        return Theme::all();
    }
}