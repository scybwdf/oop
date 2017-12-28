<?php

class Danlie{
    public $rand;
    static public $ob;
    final protected function __construct(){
        $this->rand=mt_rand(100000,9999999);
    }

    static public function getin(){
        if(!self::$ob){
            self::$ob=new Danlie();
        }
        return self::$ob;
    }

}

class Test extends Danlie{
    public function __construct(){
        var_dump(rand(10000,300000));
    }

}

new Test();
new Test();
die;
var_dump(Danlie::getin());
var_dump(Danlie::getin());
?>