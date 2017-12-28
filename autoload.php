<?php

function abc($name){
    include __dir__."/{$name}.class.php";
}

spl_autoload_register('abc');//new 一个不存在的类执行

new mysql;