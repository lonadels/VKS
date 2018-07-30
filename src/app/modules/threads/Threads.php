<?php
namespace app\modules\threads;

use app;
use framework;
use std;

class Threads extends AbstractClass
{
    /**
     * Runs function in main thread
     * 
     * @param callable function
     * @param bool wait function end
     * 
     * @return mixed|null 
     */
    function r(callable $call, bool $wait = false)
    {
        return $wait ? App::runLaterAndWait($call) : App::runLater($call);
    }
    
    /**
     * Runs function and wait 
     * 
     * @param callable function 
     */
    function w(callable $call)
    {
        $this->r($call, true);
    }

    /**
     * Create new thread and start
     * 
     * @param callable function
     * @return php\lang\Thread thread
     */
    function t(callable $call): \php\lang\Thread
    {
        $thread = new \php\lang\Thread($call);
        $thread->start();
        
        return $thread;
    }
}