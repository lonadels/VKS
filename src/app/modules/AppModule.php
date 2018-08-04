<?php
namespace app\modules;

use std, gui, framework, app, app\debug;

class AppModule extends AbstractModule
{
    /** @var app\modules\Debug debug class */
    public $debug;
    
    /** @var app\modules\Main main class */
    public $main;
    
    /** @var app\modules\threads\Threads threads */
    public $threads;
    
    /** @var app\modules\updater\Updater updater */
    public $updater;
    
    /** @var app\modules\forms\Preloader preloader */
    private $preloader;

    function __construct()
    {    
        # Advancement debug processor
        $this->debug = new debug\Debug($this);
        
        # Simplified threading
        $this->threads = new threads\Threads($this);
        
        # Simplified threading
        $this->updater = new updater\Updater($this);
        
        uiLater(function(){
           ($this->preloader = new \app\modules\forms\Preloader)->show(); 
        });
    
        $this->threads->t(function(){
        
            $this->debug->log("Waiting for application create...");
        
            # Waiting for application loading
            while( ! Application::isCreated() );
                       
            $this->debug->log("Application was created.");
            $this->main = new Main($GLOBALS['argv']);
              
            uiLater(function(){
                $this->preloader->hide(); 
            });    
      
        });
    }
}
