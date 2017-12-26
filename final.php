<?php

class A{
    /*
     * final属性不能被重新
     */
    final public function aa(){
        echo 11;
    }
}

class B extends A{
    /*
    * final属性不能被重新
    */
    public function aa(){
        echo 22;
    }
}

$b=new B();
$b->aa(); //final属性不能被重写，调用会出错
?>