<?php

class Route
{
    /**
     * Available methods
     */ 
    protected $methods = [
        'get',
        'post'
    ];

    protected $GET = 0;
    protected $POST = 1;

    /**
     * Get method
     */ 
    public function get($uri, $callback) {
        $this->route($this->methods[$this->GET], $uri, $callback);
    }

    /**
     * Main method
     */ 
    protected function route($method, $uri, $callback) {
        if($method == $this->methods[$this->POST])
            $callback($_POST);
        $callback();
    }
}