<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Type;

class ClubsController extends Controller
{
	public function getIndex(Request $request) {

    	// Fetch from the database based on slug

    	$items = Item::orderBy('id', 'desc')->where('type_id', '=', '2')->paginate(5);
        
        if ($request->ajax()) {
            return view('clubs.load', ['items' => $items])->render();  
        }
        // Return a view and pass in the above variable

        return view('clubs.index', compact('items'))->withItems($items);

    }

    public function getSingle($slug) {

    	// Fetch from the database based on slug

    	$item = Item::where('slug', '=', $slug)->first();

    	// Return the view and pass in the post object

    	return view('clubs.single')->withItem($item);

    }
}
