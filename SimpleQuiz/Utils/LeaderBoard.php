<?php
namespace SimpleQuiz\Utils;

class LeaderBoard {
    
    public static function getMembers($quizid)
    {  
        $members = \ORM::for_table('users')
                ->left_outer_join('quiz_users', array('quiz_users.user_id', '=', 'users.id'))
                ->where('quiz_users.quiz_id', $quizid)
                ->order_by_desc('quiz_users.score')
                ->find_array();
        
        return $members;
    }
    
    public static function addMember($quizid, $user,$score,$start,$end,$timetaken)
    {  
        //this should be called at start of quiz and fail if user already exists
        //record should be updated at end of quiz with score etc
        $userexists =  \ORM::for_table('users')->where('name', $user)->find_one();
        
        if (! $userexists) {
           $newuser = \ORM::for_table('users')->create();
           $newuser->set('name', $user);
           $newuser->save();
           $userid = $newuser->id();
        }
        else {
            $userid = $userexists->id();
        }
        
        $quizuser = \ORM::for_table('quiz_users')->create();
        $quizuser->set(array(
            'quiz_id' => $quizid,
            'user_id'  => $userid,
            'score' => $score,
            'start_time' => $start,
            'date_submitted' => $end,
            'time_taken' => $timetaken
        ));
        $quizuser->save();
        return true;
    }
}