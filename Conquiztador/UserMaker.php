<?php

/**
 * Include the DatabaseConnection file
 */ 
require("DatabaseConnection.php");

class UserMaker
{
    /**
     * DatabaseConnection object 
     */ 
    public $database;
 
    /**
     * Default constructor
     * @param $databaseObject
     */
    function __construct(&$databaseObject)
    {
        $this->database = $databaseObject;
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
