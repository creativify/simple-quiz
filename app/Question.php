<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num', 'quiz_id', 'text',
    ];

    public function quiz()
    {
        return $this->belongsTo('\App\Quiz');
    }

    public function answers()
    {
        return $this->hasMany('\App\Answer');
    }
}
