<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
