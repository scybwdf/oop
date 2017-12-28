
<?php

  function t1(){
      if(rand(1,10)>5){
          throw new Exception("T1错误",1);
      }
      else{
          return t2();
      }
  }

  function t2(){
      if(rand(1,10)>5){
          throw new Exception("T2错误",2);
      }
      else{
          return t3();
      }
  }

  function t3(){
      if(rand(1,10)>5){
          throw new Exception("T3错误",3);
      }
      else{
          return true;
      }
  }

  try{
      var_dump(t1());
  }
  catch(Exception $e){
      echo "行号:{$e->getLine()},";
      echo "文件位置:{$e->getFile()},";
      echo "错误信息:{$e->getMessage()}";
  }