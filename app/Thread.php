<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;

use Cviebrock\EloquentSluggable\SluggableTrait;

class Thread extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = ['title'];

    protected $touches = ['forum'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

	public function forum()
	{
		return $this->belongsTo('App\Forum');
	}

    public function posts()
    {
    	return $this->hasMany('App\ForumPost');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
