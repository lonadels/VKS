<?php
namespace app\modules\forms;

use app;
use gui;

class FormsManager 
{
    /** @var app\modules\forms\SVGLoader */
    private $SVGLoader;
    
    /** @var php\gui\UXForm Active Fragment Form */
    private $currentForm;

    /**
     * Show form in main fragment 
     */
    public function show(php\gui\UXForm $form)
    {
        if($this->currentForm == $form) return;
        
        $this->SVGLoader->eachForm($form);
    
        $fragment = app()->form("MainForm")->mainFragment;
        $form->showInFragment( $fragment );
        
        if( isset($this->currentForm) )
            $this->currentForm->free();
            
        $this->currentForm = $form;    
    }
    
    function __construct()
    {
        app()->appModule()->debug->construct(__CLASS__);
        
        $this->SVGLoader = new app\modules\forms\SVGLoader;
    }
}