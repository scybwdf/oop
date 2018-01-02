<?php

abstract class aDB{

    /**
     * 连接数据库，从配置文件读取配置信息
     */
    abstract public function conn();

    /**
     * 执行sql
     * @param $sql
     * @return mixed
     */
    abstract public function query($sql);

    /**获取所有记录
     * @param $sql
     * @return array
     */
    abstract public function getAll($sql);

    /**
     * 获取一行记录
     * @param $sql
     * @return mixed
     */
    abstract public function getRow($sql);

    /**
     * 获取一条记录
     * @param $sql
     * @return mixed
     */
    abstract public function getOne($sql);

    /**
     * 自动创建sql 并执行
     * @param $data 关联数组 键/值与表中列/值对应
     * @param $table 表名称
     * @param string $act 动作 insert/update
     * @param string $where 条件
     * @param int return 新插入行的主键值或行数
     */
    abstract public function Exec($data,$table,$act='insert',$where='0');

    /**
     * 获取最后插入的id
     * @return mixed
     */
    abstract public function lastId();

    /**
     * 获取sql影响行数
     * @return mixed
     */
    abstract public function affectRows();

}

class Mysql extends aDB {
    public $link;

    public function __construct()
    {
        $this->conn();


    }

    /**
     * 连接数据库，从配置文件读取配置信息
     */
    public function conn(){
        $cfg=include "config.php";
        $this->link=new mysqli($cfg['HOST'],$cfg['USER'],$cfg['PASSWORD'],$cfg['DB']);
        $this->query('set names '.$cfg['charset']);
    }

    /**
     * 执行sql
     * @param $sql
     * @return mixed
     */
     public function query($sql){
        return $this->link->query($sql);
     }

    /**获取所有记录
     * @param $sql
     * @return array
     */
    public function getAll($sql){
        $res=$this->query($sql);
        $data=[];
        while($re=$res->fetch_assoc()){
            $data[]=$re;
        }
        return $data;
    }

    /**
     * 获取一行记录
     * @param $sql
     * @return mixed
     */
    public function getRow($sql){
        $res=$this->query($sql);
        $data=$res->fetch_assoc();
        return $data;
    }

    /**
     * 获取一条记录
     * @param $sql
     * @return mixed
     */
    public function getOne($sql){
        $res=$this->query($sql);
        $data=$res->fetch_row()[0];
        return $data;

    }

    /**
     * 自动创建sql 并执行
     * @param $data 关联数组 键/值与表中列/值对应
     * @param $table 表名称
     * @param string $act 动作 insert/update
     * @param string $where 条件
     * @param int return 新插入行的主键值或行数
     */
    public function Exec($data,$table,$act='insert',$where='0'){
        if($act=='insert'){
            $sql='insert into '.$table.' (';
            $sql.=implode(',',array_keys($data)).") values ('";
            $sql.=implode("','",array_values($data))."')";
        }
        else{

            $sql="update {$table} set ";
            foreach ($data as $k=>$v){
                $sql.=$k."='".$v."',";
            }
            $sql=rtrim($sql,',');
            $sql.=" where $where";

        }
        return $this->query($sql);
    }

    public function lastId(){
        return $this->link->insert_id;
    }

    public function affectRows(){
        return $this->link->affected_rows;
    }
}
?>