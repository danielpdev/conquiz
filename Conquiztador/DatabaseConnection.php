<?php

/**
 * Include the Database utilities
 */
require('DatabaseUtills.php');

class DatabaseConnection
{

	/**
     * Database URL
     * @var String
     */
    private $DATABASE_URL = 'localhost';

    /**
     * Database Name
     * @var String
     */
    private $DATABASE_NAME = 'danielpo_hello';

    /**
     * Username
     * @var String
     */
    private $USERNAME =  'danielpo_user';

    /**
     * Password
     * @var String
     */
    private $PASSWORD = 'braincode';

    /**
     * Holds the connection to Database
     * @var unknown_type
     */
    private $connection;

	/**
	 * DDatabase default constructor
	 */
    function __construct() {
        $this->connect();
    }
    
    /**
     *  Make the connection to the database
     */
    public function connect()
    {
    	$this->connection=mysqli_connect($this->DATABASE_URL, $this->USERNAME, $this->PASSWORD, $this->DATABASE_NAME);

		if (mysqli_connect_errno($this->connection))
		  {
		  	echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
		  }
		  else
		  {
		  	echo '<br/>Connected to database';
		  }
    }

    /**
     * Create the user with the name and password given 
     * @param unknown_type $username
     * @param unknown_type $password
     */
    public function createUser(&$username,&$password,&$registrationid)
    {
        if(isset($this->connection))
        {
        	if(!$this->isExistingUser($username, $password))
        	{
    	    	mysqli_query($this->connection,Utills::getQueryInsertUsernameAndPassword($username,$password));
    	    	$this->createRegistrationId($registrationid);
    	        echo '<br/>User was made';
                mysqli_commit($this->connection);
        	}
        }
    }

	/**
	 * Insert the registrationid provided by Google Cloud Messaging for every user in the Registration table 
	 * @param $registerId
	 */    
    public function createRegistrationId(&$registerId)
    {
        if(isset($this->connection))
        {
        	mysqli_query($this->connection,Utills::getQueryInsertRegistrationId($registerId));
        	echo '<br/>Registration complete';

        }
    }
    
    /**
     * Verify if the user exist in the database 
     * @param $username
     * @param $password
     */
    public function isExistingUser(&$username,&$password)
    {
        if(isset($this->connection))
        {
    	    if(mysqli_num_rows(mysqli_query($this->connection,Utills::getQueryVerifyUsernameAndPassword($username))))
    	    {
    	    	echo '<br/> User allready exists';
    	    	return true;
    	    }
    	    else
    	    {
    		    return false;
    	    }
        }
    }
}
?>
