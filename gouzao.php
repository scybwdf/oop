<?php

class Gouzao{

    /**
     * 析构方法，对象销毁时运行
     */
    public function __destruct()
    {
        echo 222;
    }
    /**
     * Gouzao constructor. 一但实列化就会被调用
     */
    public function __construct($a,$b){
        echo $a.$b;
    }


}

new Gouzao('aaa','bbb');
?>