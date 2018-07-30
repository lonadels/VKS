<?php
namespace app\modules\VKAPI\Methods;

use app\modules\VKAPI\APIProcessor;

class Messages extends app\modules\VKAPI\APIProcessor
{
    /**
     * Returns a list of conversations.
     * 
     * @param array array of params
     * @return array Returns an object with the following fields
     */
    public function getConversations(array $params): object 
    {
        return $this->method(__CLASS__, __FUNCTION__, $params);
    }
}