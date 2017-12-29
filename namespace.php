<?php
namespace wf;
require "namespace_1.php";
class net{
    public function __construct()
    {
        echo 111;
    }
}

use wf2\net as net2;
new net2();