<?php

class Ren{

    public $name='wf';

    public $zuopin='video';

    public function pai(){
        echo $this->name.'拍php';
    }
}

//$this谁实列化就是谁
$ren=new Ren();
$ren->pai();

$n=new Ren();

$n->name='qq';

$n->pai();