<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_num', 'quiz_id', 'question_id', 'text', 'correct',
    ];

    public function question()
    {
        return $this->belongsTo('\App\Question');
    }
}
