<?php
namespace app\modules;

use app;

abstract class AbstractClass 
{   
    function __construct(AppModule $appModule){
        $appModule->debug->construct(__CLASS__);
    }
}