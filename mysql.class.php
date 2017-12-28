<?php

class Mysql{
    public $link;

    public function __construct()
    {
        $this->conn();
    }

    public function conn(){
        $config=array(
            'host'=>'localhost',
            'user'=>'root',
            'password'=>'dakehui9118',
            'db'=>'wf',
            'charset'=>'utf8'
        );
        $this->link=mysqli_connect($config['host'],$config['user'],$config['password'],$config['db']);
        mysqli_query("set names {$config['charset']}",$this->link);
        return $this->link;
    }

    public function query($sql){
        return mysqli_query($this->link,$sql);
    }

    public function getAll($sql){

        $data=array();
        $res=$this->query($sql);
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
         }
        return $data;

    }
}
$mysql=new Mysql();
var_dump($mysql->getAll("select * from wf_active"));

?>