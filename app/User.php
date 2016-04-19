<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements SluggableInterface
{
    use SoftDeletes;
    use SluggableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nickname', 'email', 'password',
    ];

    /**
     * Sluggable
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function isAdmin()
    {
        return $this->group()->where('id', 1)->first();
    }

    public function group()
    {
        return $this->hasOne(UserGroup::class, 'id', 'group');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }
    
    public function forumposts()
    {
        return $this->hasMany(ForumPost::class, 'user_id', 'id');
    }
    

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'user_id', 'id');
    }

    public function xp()
    {
        return $this->hasOne(Experience::class, 'user_id', 'id');
    }
}


