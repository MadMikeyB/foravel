<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Golonka\BBCode\Facades\BBCodeParser as BBCode;

class ForumPost extends Model
{

    protected $touches = ['thread'];

	protected $fillable = ['content'];

    public function getContentAttribute( $content )
    {
        return BBCode::parse($content); 
    }   

    public function thread()
    {
    	return $this->belongsTo('App\Thread');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
