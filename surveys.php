<?php
include 'class/surveys/surveys.php';
?>


<div id="last">
Latest Surveys
</div>
<div id="content">

<?php

foreach(Surveys::getSurveyList(5) as $surveys)
{
	echo $surveys->question;
	echo '<br>';
	echo 'Oui : 80 %';
	echo '<br>';
	echo 'Non : 20 %';
	echo '<br>';
}
?>
</div>

<div id="last">
Survey History
</div>
<div id="content">

<?php

foreach(Surveys::getSurveyHistory(1) as $surveys)
{
	echo $surveys->question;
	echo '<br>';
	echo 'Oui : 80 %';
	echo '<br>';
	echo 'Non : 20 %';
	echo '<br>';
}
?>
</div>

<div id="last">
Add Survey
</div>
<div id="content">
	<form action="" method="post"> 
	<input id="question" name="question" type="text" placeholder="question" /><br>
	<button id="addsurvey">SUBMIT</button>
	</form>
</div>

<?php
if (isset($_POST['question']))
{
	Surveys::addsurvey($_POST['question'],"");
}
?>