<?php

/**
 * User 
 */
require("User.php");
class UserMaker extends User
{

 
    /**
     * Default constructor
     * @param $databaseObject
     */
    function __construct(&$databaseObject)
    {
    	parent::__construct($databaseObject);
    }
    
    /**
     * 
     * Make User with the following information
     * @param String $username
     * @param String $password
     * @param String $registerId
     */
    public function makeUser($username,$password,$registerId)
    {
        $this->database->createUser($username,$password,$registerId);
    }    
}
$user=new UserMaker(new DatabaseConnection());
$user->makeUser($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['registrationid']);
?>
