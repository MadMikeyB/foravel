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

    public function countReactions($post_id, $reaction)
    {
    	return Reaction::where(['post_id' => $post_id, 'reaction' => $reaction])->count();
    }

    public function hasReacted($post)
    {
    	return Reaction::where(['post_id' => $post->id, 'user_id' => Auth::user()->id])->first();
    }
}
