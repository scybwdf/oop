<?php

abstract class aUpload {

    public  $allowExt=array('.jpg','.jpeg','.gif','.png');

    public $maxSize=1;//最大上传文件大小，M

    public $path='upload';

    protected $error='';

    abstract public function getInfo($name);

    /*
     * 在当前网站根目录upload目录生成年/月日 创建目录
     * 例如 /upload/2018/0102
     *
     */
    abstract public function createDir();

    /**
     * 生成随机文件名
     * @param int $len
     * @return mixed
     *
     */
    abstract public function randStr($len = 8);


    abstract public function up($name);
    /**
     * 检测文件的大小
     * @param $size
     * @return mixed
     */
    abstract protected function checkSize($size);

    /**
     * 检测文件类型
     * @param $type
     * @return mixed
     */
    abstract protected function checkType($type);

    public function getError(){
        return $this->error;
    }
}

class Upload extends aUpload{


    /**
     * 获取文件信息
     * @param $name
     */
    public function getInfo($name){

        return $_FILES[$name];

     }

    /*
     * 在当前网站根目录upload目录生成年/月日 创建目录
     * 例如 /upload/2018/0102
     *
     */
    public function createDir(){
    $path=$this->path;

    $pathname='./'.$path.'/'.Date('Y').'/'.Date('m').'/'.Date('d');

    if(!is_dir($pathname)){

        if(!mkdir($pathname,0777,true)){
            echo "请修改目录权限";
        };
    }
        return  $pathname;

    }

    /**
     * 生成随机文件名
     * @param int $len
     * @return mixed
     *
     */
     public function randStr($len = 8){
        return md5(rand(0,1000).time().mt_rand(1000,9999));
     }

    /**
     * 检测文件的大小
     * @param $size
     * @return mixed
     */
     protected function checkSize($size){

        return $size < $this->maxSize*1024*1024;

     }

    /**
     * 检测文件类型
     * @param $type
     * @return mixed
     */
     protected function checkType($type){

        return in_array($type,$this->allowExt);
     }


    public function up($name){
        if(!isset($_FILES[$name])){
            $data['status']=0;
            $data['info']="文件不存在";
            return $data;

        }

        $info=$this->getInfo($name);
        $ext=strtolower(strrchr($info['name'],'.'));
        if(!$this->checkType($ext)){
            $data['status']=0;
            $data['info']="文件不存在或格式不支持";
            return $data;

        }

        if(!$this->checkSize($info['size'])){
            $data['status']=0;
            $data['info']="文件太大";
            return $data;

        }

        $path=$this->createDir();

        $filename=$this->randStr().$ext;

        if(move_uploaded_file($info['tmp_name'],$path.'/'.$filename)){
            $data['status']=1;
            $data['path']=$path;
            $data['filename']=$filename;
            $data['pname']=$path.'/'.$filename;
            return $data;
        };



    }
}

$file=new Upload();
var_dump($file->up('icon'));



