<?php
require("DatabaseConnection.php");

abstract class User
{
	/**
    * DatabaseConnection object 
    */ 
    public $database;

    function __construct($databaseConnection)
    {
    	$this->database = $databaseConnection;
    }
}
?>