<?php

namespace SimpleQuiz\Utils\Base\Helpers;

class General
{
    
    public static function shuffleAssoc($array)
    {
        $keys = array_keys($array);
        shuffle($keys);
        $shuffled = array();
        foreach ($keys as $key) 
        {
            $shuffled[$key] = $array[$key];
        }
        return $shuffled;
    }
    
    public static function memberSort( $a, $b ) 
    {
        return $b['score'] - $a['score'];
    }

}