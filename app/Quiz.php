<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    public function category()
    {
        return $this->hasOne('\App\Category');
    }

    public function questions()
    {
        return $this->hasMany('\App\Question');
    }
}
