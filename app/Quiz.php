<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'category_id', 'active',
    ];

    public function category()
    {
        return $this->hasOne('\App\Category');
    }

    public function questions()
    {
        return $this->hasMany('\App\Question');
    }
}
