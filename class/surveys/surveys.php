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
		$query = "SELECT * from surveys ORDER BY id DESC LIMIT ".$limit." ";
		$select = $connexion->query($query);
		return $select->fetchAll(PDO::FETCH_OBJ);
	}
	
	public static function getSurveyAnswerList($idSurvey)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT id as idAnswer, answer from surveyanswerslist WHERE idSurvey='".$idSurvey."'";
		$select = $connexion->query($query);
		return $select->fetchAll(PDO::FETCH_OBJ);
	}
	
	public static function getNbrAnswer($idAnswer)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT count(*) as nbr from surveyanswers WHERE idAnswer='".$idAnswer."' GROUP BY idAnswer";
		$select = $connexion->query($query);
		return $select->fetchColumn();
	}
	
	public static function addSurvey($question,$answers,$idUser)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "INSERT INTO surveys (id, idUser, question) values ('', '".$idUser."','".$question."');";
		$connexion->query($query);
		
		$query = "SELECT MAX(id) from surveys";
		$select = $connexion->query($query);
		$id = $select->fetchColumn();
		
		for($i=1;$i<count($answers);$i++)
		{
			$query = "INSERT INTO surveyanswerslist (id, idSurvey,answer) values ('', '".$id."','".$answers['answer'.$i.'']."');";
			$connexion->query($query);
		}
		return true;
	}
	
	public static function getSurveyHistory($idUser)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT * from surveys WHERE idUser=".$idUser." ORDER BY id DESC";
		$select = $connexion->query($query);
		return $select->fetchAll(PDO::FETCH_OBJ);
	}
	
	public static function hasAnswer($idUser,$idSurvey)
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT COUNT(*) as nbr from surveyanswers WHERE idSurvey='".$idSurvey."' AND idUser='".$idUser."'";
		$select = $connexion->query($query);
		$result = $select->fetch();
		
		if ($result['nbr'] == '1')
			return true;
		
		else
			return false;
	}
	
	public static function answerSurvey($idUser,$idSurvey,$answer)	
	{
		$connexion = new PDO($GLOBALS['host'], $GLOBALS['username'], $GLOBALS['password']);
		$query = "SELECT id from surveyanswerslist WHERE idSurvey='".$idSurvey."' AND answer='".$answer."'";
		$select = $connexion->query($query);
		$idAnswer = $select->fetchColumn();
		
		$query = "INSERT INTO surveyanswers (id, idUser,idSurvey, idAnswer) values ('', '".$idUser."','".$idSurvey."','".$idAnswer."');";
		$connexion->query($query);
	}
	
}