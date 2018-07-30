<?php
namespace app\modules\updater;

use app;

class Updater extends AbstractClass
{
    const VERSION = '0.0.1';
    const SUFFIX = 'a';
    const BUILD = 183007.1;
    
    /**
     * Change application file to new version
     * 
     *`@param string path to update file
     *`@param string path to application
     */
    function update( string $updPath, string $appPath )
    {
        
    }
}