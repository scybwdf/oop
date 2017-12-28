<?php

//抽象类
abstract class Db{

    /**
     * @param $sql sql语句
     * @return mixed array;
     */
   abstract public function getALL($sql);

    /**
     * @param $sql sql语句
     * @return mixed array;
     *
     */
   abstract public function getRow($sql);


}

//抽象类不能被实列化

class Mysql extends Db{

    public function getAll($sql){

    }

    public function getRow($sql){

    }
}

?>