<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
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
        return $this->belongsTo('\App\Category');
    }

    public function questions()
    {
        return $this->hasMany('\App\Question');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Scope a query to only include active users.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function isActive()
    {
        return (bool) $this->active;
    }
}
