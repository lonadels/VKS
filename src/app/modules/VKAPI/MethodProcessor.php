<?php
namespace app\modules\VKAPI;

use app;

class MethodProcessor extends app\modules\VKAPI\APIProcessor
{

    /** @var string App service token */
    private $serviceToken;

    /**
     * main function of processing methods VK API
     * 
     * @param object category of methods (messages, photos, etc.)
     * @param string method name (getConversations, post, etc.)
     * @param array method params (see VK API Documentation)
     * 
     * @return object result returned by server
     */
    private function method(object $categoryClass, string $method, array $params): object
    {
        $category = get_class($categoryClass);
    
        $params["v"] = self::API_VER;
        $params["access_token"] = $this->users->getCurrent()->token;
    
        $ch = new jURL(self::API_URL . "{$category}.{method}");
        $ch->setPostData($params);
        $ch->exec(function($result, $ch){
            var_dump($result);
        });
    }
}