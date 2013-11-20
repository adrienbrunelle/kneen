
<?php
include 'class/surveys/surveys.php';


if (!isset($_GET['a']))
{
	echo ' <div class="page-header">
		<h1>Latest Surveys</h1>
	</div>';
	

	
	foreach(Surveys::getSurveyList(5) as $surveys)
	{
		echo '<legend>';
		echo $surveys->question;
		echo '</legend>';
		
		$total = 0;
		if ($surveys->idUser == $_SESSION['userId'] || Surveys::hasAnswer($_SESSION['userId'],$surveys->id))
		{
			foreach(Surveys::getSurveyAnswerList($surveys->id) as $answers)
			{		
				$nbrAnswer = Surveys::getNbrAnswer($answers->idAnswer);
				$total += $nbrAnswer;		
			}
			foreach(Surveys::getSurveyAnswerList($surveys->id) as $answers)
			{	
				$nbrAnswer = Surveys::getNbrAnswer($answers->idAnswer);
				
				if ($nbrAnswer>0)
				{
					echo $answers->answer;
					echo '<div class="progress">
						<div class="bar" style="width: '.$nbrAnswer/$total * 100 .'%;">
						<span class="sr-only">'.$nbrAnswer/$total * 100 .' %</span>
						</div>
							</div>';
				}
				else
				{
					echo $answers->answer;
					echo '<div class="progress">
					<div class="bar" style="width: 0%;">
					<span class="sr-only">0 %</span>
					</div>
					</div>';
				}
			}
		}
		else
		{
			echo '<form class="" action="?p=surveys&a=answer&id='.$surveys->id.'" method="post">';
			foreach(Surveys::getSurveyAnswerList($surveys->id) as $answers)
			{	
				echo '
								<div class="control-group">
				
				<div class="controls">
					<label class="radio" for="radios-0">
					<input type="radio" name="radio" id="radios-0" value="'.$answers->answer.'">';
				echo $answers->answer;
				echo '</label>

				</div>
				</div>';
				
				
				
				
			}
			echo '<button id="singlebutton" name="singlebutton" class="btn btn-success">Answer</button>';
			echo '</form>';
			
		}
	}
}
else if ($_GET['a'] == "your")
{
	echo ' <div class="page-header">
		<h1>Your Surveys</h1>
	</div>';
	foreach(Surveys::getSurveyHistory($_SESSION['userId']) as $surveys)
	{
		echo '<legend>';
		echo $surveys->question;
		echo '</legend>';
		
		$total = 0;
		
		foreach(Surveys::getSurveyAnswerList($surveys->id) as $answers)
		{		
			$nbrAnswer = Surveys::getNbrAnswer($answers->idAnswer);
			$total += $nbrAnswer;		
		}
		foreach(Surveys::getSurveyAnswerList($surveys->id) as $answers)
		{	
			$nbrAnswer = Surveys::getNbrAnswer($answers->idAnswer);
			
			if ($nbrAnswer>0)
			{
				echo $answers->answer;
				echo '<div class="progress">
					<div class="bar" style="width: '.$nbrAnswer/$total * 100 .'%;">
					<span class="sr-only">'.$nbrAnswer/$total * 100 .' %</span>
					</div>
						</div>';
			}
			else
			{
				echo $answers->answer;
				echo '<div class="progress">
				<div class="bar" style="width: 0%;">
				<span class="sr-only">0 %</span>
				</div>
				</div>';
			}
		}
	}
}
else if ($_GET['a'] == "answer")
{
	Surveys::answerSurvey($_SESSION['userId'],$_GET['id'],$_POST['radio']);
}

else if ($_GET['a'] == "add")
{
	?>
	<div class="page-header">
	<h1>Add Survey</h1>
	</div>
	
	<form class="form-horizontal" method="post" action="">

	<div class="control-group">
	<label class="control-label" for="textinput">Question</label>
	<div class="controls">
	<input id="question" name="question" type="text" placeholder="Question" class="input-xlarge">
	</div>
	</div>

		<div class="control-group">
	<label class="control-label" for="textinput">Answer 1</label>
	<div class="controls">
	<input id="answer1" name="answer1" type="text" placeholder="Answer" class="input-xlarge">
	</div>
	</div>
	
		<div class="control-group">
	<label class="control-label" for="textinput">Answer 2</label>
	<div class="controls">
	<input id="answer1" name="answer2" type="text" placeholder="Answer" class="input-xlarge">
	</div>
	</div>
	
	
	<div id="b">
	
	
	
	</div>

	<div class="control-group">

	<div class="controls">
	<a id="addbutton" name="addbutton" class="btn btn-primary">Add Answer</a>
	<a id="removebutton" name="addbutton" class="btn btn-danger">Remove Answer</a>
	<button id="singlebutton" class="btn btn-success">Submit</button>
	
	</div>
	</div>


	</form>

	<?php
}

if (isset($_POST['question']))
{
	
	Surveys::addsurvey($_POST['question'],$_POST,$_SESSION['userId']);

	//print_r($_POST);
	//echo(count($_POST));
}
?>