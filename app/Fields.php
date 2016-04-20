<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    public function user()
    {
    	return $this->belongsToMany(User::class, 'user_fields');
    }
}
