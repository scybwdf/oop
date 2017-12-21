<?php

    class Ren{

        //属性的申明
        public $name='wf';

        //方法的申明
        public function man(){
            echo "666";
        }
    }

    $r=new Ren();

  echo $r->name;
    $r->man();

?>