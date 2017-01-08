<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id', 'reaction'
    ];

    public function post()
    {
    	return $this->belongsTo('App\ForumPost');
    }
}
