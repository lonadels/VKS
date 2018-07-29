<?php
namespace app\modules;

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
    
    function __construct(){
        $this->log("Logger was started");
    }
}