<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['post_id','body','user_id'];

    protected $hidden = [];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }

    public function users()
    {
        return $this->belongsTo('App\Reply');
    }

}
