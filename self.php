<?php

class Danlie{
    public $rand;
    static public $ob;
    final protected function __construct(){
        $this->rand=mt_rand(100000,9999999);
    }

    static public function getin(){
        if(!self::$ob){
            self::$ob=new self();
        }
        return self::$ob;
    }

}
var_dump(Danlie::getin());
