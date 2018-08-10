<?php
namespace app\forms;

use std, gui, framework, app;


class MainForm extends AbstractForm
{

    /**
     * @event panel3.click-Left 
     */
    function doPanel3ClickLeft(UXMouseEvent $e = null)
    {    
        app()->shutdown();
    }

    /**
     * @event panelAlt.click-Left 
     */
    function doPanelAltClickLeft(UXMouseEvent $e = null)
    {    
        $this->iconified = true; 
    }

}
