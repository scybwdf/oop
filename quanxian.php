<?php

class A{
    //public 调用
    public $ren='aa';

    public function aa2(){
        return $this->ren;
    }
    // protected 调用

    protected $ren2='bb';

    public function cc2(){
        return $this->ren2;
    }

    //private 调用

    private $ren3='cc';
    public function dd2(){
        return $this->ren3;
    }


}

class B extends A{
    public function aa1(){
        return $this->ren;
    }

    public function cc1(){
        return $this->ren2;
    }

    public function dd1(){
        return $this->ren3;
    }
}

$b=new B();

//public 支持外部、本类、子类调用
/*echo $b->ren;
echo $b->aa2();
echo $b->aa1();*/

//protected 支持本类、子类调用，不支持外部调用
//echo $b->ren2;
//echo $b->cc2();
//echo $b->cc1();

//private 只支持内部调用

echo $b->ren3;//无法调用
echo $b->dd2();
echo $b->dd1();//无法调用

?>