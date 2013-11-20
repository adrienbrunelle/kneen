<?php
include '/../config.php';	
class Members
{
	private $id;
	private $login;
	private $password;
	private $gender;
	
	
	public static function login($login,$password)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT count(*) as nbr,id from users WHERE login='".$login."' AND password='".$password."'";
		$select = $connexion->query($query);
		$result = $select->fetch();
		
		if ($result['nbr'] == '1')
		{
			
			$_SESSION['userId'] = $result['id'];
			return true;
		}
		else
		{
			return false;
		}
	}
		
	public static function register($login,$password,$gender)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT count(*) as nbr from users WHERE login='".$login."' AND password='".$password."'";
		$select = $connexion->query($query);
		$result = $select->fetchColumn();
		
		if ($result == '1')
		{
			return false;
		}

		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "INSERT INTO users (id, login, password, gender) values ('', '".$login."', '".$password."', '".$gender."');";
		$connexion->query($query);

		return true;
	}
	
	public static function updateSettings()
	{
		
	}
	
}


	



?>