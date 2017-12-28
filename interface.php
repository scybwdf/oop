<?php

interface flyer{
    //只能用public
    public function fly($a,$b);
}
interface runer{
    public function run($a,$b);
}
interface water{
    public function wate($a,$b);
}

class Super implements flyer,runer,water{
    public function fly($a,$b){
        echo "fei";
    }
    public function run($a,$b){
        echo "run";
    }
    public function wate($a,$b){
        echo "water";
    }
}

$a=new Super();

$a->fly(1,2);