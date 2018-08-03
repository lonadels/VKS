<?php
namespace app;

use app;

class Main 
{
    function __construct(array $args)
    {
        app()->appModule()->debug->construct(__CLASS__);
        
        if( in_array("-u", $args) )
            message("Update");
          
        uiLater(function(){
            app()->form("MainForm")->show(); 
        });    
           
    }
}