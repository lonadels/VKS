<?php
namespace app\modules\VKAPI;

use app;
use std;

class APIProcessor 
{

    /** @var float VK API version */
    const API_VERSION = 5.80;
    
    /** @var string VK API Method Server URL */
    const API_URL = "api.vk.com/method";
    
    /** @var string VK API Auth Server URL */
    const API_AUTH = "oauth.vk.com";
    
    /** @var int VK API App ID */
    const APP_ID = 3140623;
    
    /** @var string|null VK API App secret */
    const APP_SECRET = 'VeWdmVclDCtn6ihuP1nt';
    
    /** @var app\modules\VKAPI\UsersProcessor users */
    public $users;
    
}