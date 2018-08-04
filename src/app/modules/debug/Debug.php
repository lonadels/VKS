<?php
namespace app\modules\debug;

use Exception;
use php\time\Time;

class Debug 
{
    const INFO = 0;
    const WARN = 1;
    const ERROR = 2;
    
    /** @var array log types */
    private $types = [
        'INFO',
        'WARNING',
        'ERROR'
    ];

    /**
     * Log 
     * 
     * @param string log text 
     * @param int log type
     */
    public function log(string $text, int $type = self::INFO)
    {
        $timestamp = Time::now()->toString("yyyy-MM-dd HH:mm:ss");
        print "[{$timestamp}][{$this->types[$type]}] {$text}\n";    
    }
    
    public function setExceptionHandler(){
         
        set_exception_handler(function ($e) {
        
            exit(0);
            static $showed = false;
        
            if ($showed) {
                return;
            }
        
            $showed = true;
        
            $dialog = new UXAlert('ERROR');
            $dialog->title = 'Ошибка';
            $dialog->headerText = 'Произошла ошибка в вашей программе';
            $dialog->contentText = $e->getMessage();
            $dialog->setButtonTypes(['Выход из программы', 'Продолжить']);
        
            $pane = new UXAnchorPane();
            $pane->maxWidth = 100000;
        
            $content = new UXTextArea("{$e->getMessage()}\n\nОшибка в файле '{$e->getFile()}'\n\t-> на строке {$e->getLine()}\n\n" . $e->getTraceAsString());
            $content->padding = 10;
            UXAnchorPane::setAnchor($content, 0);
        
            $pane->add($content);
            $dialog->expandableContent = $pane;
            $dialog->expanded = true;
        
            switch ($dialog->showAndWait()) {
                case 'Выход из программы':
                    Application::get()->shutdown();
                    break;
            }
        
            $showed = false;
        });
        
        restore_exception_handler();
    }
    
    /**
     * Log when class construct
     * 
     * @param string class name
     */
    public function construct(string $class)
    {
        $this->log("Class {$class} was construct"); 
    }
    
    function __construct()
    {
        $this->construct(__CLASS__);
    }
}