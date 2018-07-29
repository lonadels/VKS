<?php
namespace app\modules;

use std, gui, framework, app;


class AppModule extends AbstractModule
{
    /** @var app\modules\Debug debug class */
    public $debug;
    
    /** @var app\modules\Main main class */
    public $main;

    function __construct()
    {    
        $this->debug = new Debug;
        $this->debug->log("Waiting for application create...");
    
        new Thread(function(){
        
            while(! Application::isCreated() );
                       
            $this->debug->log("Application was created.");
            $this->main = new Main($GLOBALS['argv']);
            
        })->start();
    }
}
