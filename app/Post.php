<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model implements SluggableInterface
{   
    use SoftDeletes;
    use SluggableTrait;
    
    protected $fillable = ['title', 'content'];
    protected $dates = ['deleted_at'];


    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    // Handle our Markdown Conversion directly in the Model
    public function getContentAttribute($content)
    {
        return Markdown::convertToHtml($content); 
    }   

    // Add an Image
    public function addImage(Image $image)
    {
        return $this->images()->save($image);
    }

	// Author
    public function user()
    {
    	return $this->belongsTo(User::class, 'author_id', 'id');
    }

    // Category
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'content_id');
    }

    // Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Images
    public function images()
    {
        return $this->hasMany(Image::class, 'post_id', 'id');
    }

}
