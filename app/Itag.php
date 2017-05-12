<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itag extends Model
{
    public function items() {

    	return $this->belongsToMany('App\Item', 'item_itag', 'itag_id', 'item_id');

    }
}
