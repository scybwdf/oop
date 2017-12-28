<?php
//类常量
define('PI','3.14159265798');
class A{
    const PI='3.1415926';

    public function aa(){

        echo PI;//调用常量PI
        echo A::PI;
    }
}

$aa=new A();

$aa->aa();

?>