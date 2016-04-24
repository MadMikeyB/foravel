<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;

use Cviebrock\EloquentSluggable\SluggableTrait;

class Forum extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug', 'parent', 'position'
    ];

    // hasMany Thread
    public function threads()
    {
    	return $this->hasMany('App\Thread')->orderBy('id', 'asc');
    }

}
