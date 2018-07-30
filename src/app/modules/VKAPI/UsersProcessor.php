<?php
namespace app\modules\VKAPI;

use gui;
use app;

class UsersProcessor 
{

    private $users;
    private $currentUser;

    /**
     * @param int User ID
     * @param object VK User Object
     */
    public function add(int $id, object $data) 
    {
        $user = new app\modules\VKAPI\Objects\User;
        
        $user->id = $data->id;
        $user->screen = $data->screen;
        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->avatar = php\gui\UXImage::loadFromUrl( $data->photo_100 );
    
        $this->users[$user->id] = $user;
        $this->users[$user->screen] = $user;
    }
    
    /**
     * @param int|string User ID or screen name
     * @return app\modules\VKAPI\Objects\User returns User object
     */
    public function get($id): app\modules\VKAPI\Objects\User
    {
        return $this->users[$id];
    }
}