<?php
class Members
{
	private $id;
	private $login;
	private $password;
	private $gender;
	
	
	public static function login($login,$password)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT count(*) from users WHERE login='".$login."' AND password='".$password."'";
		$select = $connexion->query($query);
		return $select->fetchColumn();
	}
		
	public static function register($login,$password,$gender)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "INSERT INTO surveys (id, login, password, gender) values ('', '".$login."', '".$password."', '".$gender."');";
		$connexion->query($query);
	}
	
	public static function updateSettings()
	{
		
	}
	
}


	



?>