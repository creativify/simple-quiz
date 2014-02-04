<?php
namespace SimpleQuiz\Tests;

require 'vendor/autoload.php';
/**
*
* @author Ben Hall
*/
class QuizTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        \ORM::configure('mysql:dbname=simple-quiz;host=localhost');
        \ORM::configure('username', 'travis');
        \ORM::configure('password', '');
        \ORM::configure('return_result_sets', true);
        
        $this->quiz = new \SimpleQuiz\Utils\Quiz();
    }

    public function testsetId()
    {
        
        $result = $this->quiz->setId('ghj');
        
        $this->assertFalse($result);
    }
}