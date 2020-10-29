<?php

namespace App\Common;

Class Jwt{

    private static $instance;

    private function __construct(){

    }

    private function __clone(){

    }

    public static function Instance(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function encode(){
        echo "111122222jhhhh";
    }


}


