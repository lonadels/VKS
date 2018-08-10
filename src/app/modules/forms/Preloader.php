<?php
namespace app\modules\forms;

use app;
use gui;

class Preloader extends \php\gui\UXForm
{
    function __construct(){
        
        parent::__construct();

        $this->style = 'TRANSPARENT';
        $this->backgroundColor = "transparent";
        $this->addStylesheet(".theme/style.fx.css")

        $this->size = [400, 400];

        $panel = new UXPanel;
        $panel->size = [300, 300];
        $panel->position = [50, 50];
        $panel->borderWidth = 0;
        $panel->backgroundColor = "red";
        $panel->classes->add("windowShadow");
        
        $this->add($panel);
        
        
    }
}