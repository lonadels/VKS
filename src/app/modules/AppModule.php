<?php
namespace app\modules;

use std, gui, framework, app, app\debug;

class AppModule extends AbstractModule
{
    /** @var app\modules\Debug debug class */
    public $debug;
    
    /** @var app\modules\Main main class */
    public $main;

    function __construct()
    {    
        # Advancement debug processor
        $this->debug = new Debug;
        $this->debug->log("Waiting for application create...");
    
        new Thread(function(){
        
            # Waiting for application loading
            while( ! Application::isCreated() );
                       
            $this->debug->log("Application was created.");
            $this->main = new Main($GLOBALS['argv']);
      
        })->start();
    }
}
