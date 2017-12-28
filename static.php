<?php

class A{
    static public $name='wf';

    static public function aa($a,$b){
        return $a+$b;
    }
}

//不用实列化就可以调用方法

echo A::$name;

echo A::aa(1,2);
?>