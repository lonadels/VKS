<?php
namespace app\modules\forms;

use app;
use gui;

class Preloader extends \php\gui\UXForm
{
    function __construct(){
        
        parent::__construct();

        $this->style = TRANSPARENT;
        $this->addStylesheet(".theme/style.fx.css")

        $panel = new UXPanel;
        $panel->size = [300, 300];
        $panel->classes->add("windowShadow");
        
        $this->add($panel);
        
        
    }
}