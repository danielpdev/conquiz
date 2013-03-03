<?php
class Utills
{
	/**
	 * Return a query string that it is used to check in the database for existing users
	 * @param unknown_type $username
	 * @param unknown_type $password
	 */
	public static function getQueryVerifyUsernameAndPassword(&$username)
	{
		return "SELECT * FROM users where username='$username'";
	}
	
	/**
	 * 
	 * Return a String that it is used to insert a user in the database
	 * @param unknown_type $username
	 * @param unknown_type $password
	 */
	public static function getQueryInsertUsernameAndPassword(&$username,&$password)
	{
		return "INSERT INTO users(username,password) VALUES ('$username', '$password');";
	}
	
	/**
	 * 
	 * Return a String that it is used to insert the registrationid in the database
	 * @param unknown_type $registrationId
	 */
	public static function getQueryInsertRegistrationId(&$registrationId)
	{
		return "INSERT INTO Registration (registrationid) VALUES ('$registrationId');";
	}
}
?>