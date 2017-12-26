<?php
class A{
    public function aa(){
        echo 111;
    }
}

class B extends A{
    public function bb(){
        echo 222;
    }
}

$b=new B();
$b->aa();
?>