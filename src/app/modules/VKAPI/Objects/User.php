<?php
namespace app\modules\VKAPI\Objects;

abstract class User 
{
    /** @var string User token */
    public $token;
    
    /** @var int User ID */
    public $id;
    
    /** @var string User short url */
    public $screen;
    
    /** @var string User first name */
    public $firstName;
    
    /** @var string User second name */
    public $lastName;
    
    /** @var php\gui\UXImage User avatar */
    public $avatar;
}