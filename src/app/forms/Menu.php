<?php
namespace app\forms;

use std, gui, framework, app;


class Menu extends AbstractForm
{

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        $object = $this->vbox;
        $object->position = [ $object->parent->width / 2 - $object->w / 2, $object->parent->h / 2 - $object->h / 2 ];
    }

}
