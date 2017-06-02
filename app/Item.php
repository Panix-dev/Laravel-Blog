<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    public function type() {

    	return $this->belongsTo('App\Type');

    }

    public function itags() {

    	return $this->belongsToMany('App\Itag', 'item_itag', 'item_id', 'itag_id');

    }
    
    public function artists() {

    	return $this->hasMany('App\Artist');

    }

    public function favorited()
	{
	    return (bool) Favorite::where('user_id', Auth::id())->where('item_id', $this->id)->first();
	}

}
