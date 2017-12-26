<?php
class Atm{

    /*
     * 受保护的，不能被外部调用
     *
     */
    protected function getpwd(){
        return "123456";
    }

    /**
     * 公共的
     * @param $pwd
     * @return bool
     *
     */
    public function checkpwd($pwd){
        return $this->getpwd()==$pwd;
    }
}

$atm=new Atm();

var_dump($atm->checkpwd(123456));

?>