<?php
require_once('../simpletest/unit_tester.php');
require_once('../simpletest/reporter.php');

require_once('class/surveys/surveys.php');
require_once('class/members/members.php');
//require_once('../classes/log.php');

class TestOfLogging extends UnitTestCase {
    

    function testCreatingNewFile() {
		
		//Surveys
		$this->assertFalse(Surveys::getSurvey(1)->question == "SI ?");
		$this->assertFalse(Surveys::getSurvey(2)->question == "SI ?");
		
		//$this->assertTrue(Surveys::addSurvey("Test ?","","1"));
		
		//Members
		$this->assertTrue(Members::login("ab","aa"));
		$this->assertFalse(Members::login("aaaaa","aa"));
		//
		
		//print_r(Surveys::getSurveyAnswerList(8));

    }
}
$test = new TestOfLogging();
$test->run(new HtmlReporter());
?>