<?php
namespace app;

use app;

class Main 
{
    function __construct(array $args = [])
    {
        app()->appModule()->debug->construct(__CLASS__);
    }
}