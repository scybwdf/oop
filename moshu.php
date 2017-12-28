<?php

class WF{

    /**
     * @param $a访问不可见的方法时被调用
     */
    public function __get($a){
        echo $a;
    }

    /**
     * 设置不可见属性时触发
     * @param $c
     * @param $d
     */
    public function __set($c,$d){
        echo $c.'------'.$d;
    }

    /**
     * isset一个不存在的属性时触发
     * @param $name
     */
    public function __isset($name)
    {
        echo $name;
    }

    /**
     * unset一个不存在的属性时触发
     * @param $name
     */
    public function __unset($name)
    {
        echo $name;
    }
}

$dd=new WF();
$dd->sddw;
$dd->aa="ds";
isset($dd->dfd);

unset($dd->sdd);

