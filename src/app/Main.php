<?php
namespace app;

use gui;
use gui;
use Exception;
use app;

class Main 
{
    function __construct(array $args)
    {
        app()->appModule()->debug->construct(__CLASS__);
        
        if( in_array("-u", $args) )
            message("Update");
          
        uiLater(function(){
            $mainForm = app()->form("MainForm");
                    
            /*$mainForm->add( $cm = new UXContextMenu ); 
            
            $cm->items->add($delete = new UXMenuItem('Delete')); 
            $delete->on('action', function(){ 
                pre("Ты пошёл нахуй!"); 
            }); */
            

            $mainForm->show(); 
            
        });    
          
    }
}