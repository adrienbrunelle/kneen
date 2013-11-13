<?php
include '/../config.php';	
	
class Surveys
{
	private $id;
	private $type;
	private $question;
	
	function __construct()
	{
		
	}
	public static function getSurvey($idSurvey)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT * from surveys WHERE id = ".$idSurvey."";
		$select = $connexion->query($query);
		return $select->fetch(PDO::FETCH_OBJ);	
	}
	
	public static function getSurveyList($limit)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT * from surveys LIMIT ".$limit."";
		$select = $connexion->query($query);
		return $select->fetchAll(PDO::FETCH_OBJ);
	}
	
	public static function getSurveyAnswerList($idSurvey)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT COUNT(*), answer from surveyanswers WHERE idSurvey='".$idSurvey."' GROUP BY answer";
		$select = $connexion->query($query);
		return $select->fetchAll();		
	}
	
	public static function addSurvey($question,$answers,$idUser)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "INSERT INTO surveys (id, idUser, question) values ('', '".$idUser."','".$question."');";
		$connexion->query($query);
		
		$query = "SELECT MAX(id) from surveys";
		$select = $connexion->query($query);
		$id = $select->fetchColumn();
		
		$query = "INSERT INTO surveyanswerslist (id, idSurvey,answer) values ('', '".$id."','No');";
		$connexion->query($query);
		
		$query = "INSERT INTO surveyanswerslist (id, idSurvey,answer) values ('', '".$id."','Yes');";
		$connexion->query($query);
		
		return true;
	}
	
	public static function getSurveyHistory($idUser)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT * from surveys WHERE idUser=".$idUser."";
		$select = $connexion->query($query);
		return $select->fetchAll(PDO::FETCH_OBJ);
	}
	
}