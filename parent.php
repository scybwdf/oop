<?php

class Danlie{
    public $rand;
    static public $ob;
    protected function __construct(){
        $this->rand=mt_rand(100000,9999999);
    }

    static public function getin(){
        if(!self::$ob){
            self::$ob=new self();
        }
        return self::$ob;
    }

}

class Test extends Danlie{
    public function __construct()
    {
        parent::__construct();
        echo 2222;
    }
}

var_dump(new Test());
