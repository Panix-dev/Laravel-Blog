<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Type;

class PistesController extends Controller
{
	public function getIndex(Request $request) {

    	// Fetch from the database based on slug

    	$items = Item::orderBy('id', 'desc')->where('type_id', '=', '1')->paginate(5);
        
        if ($request->ajax()) {
            return view('pistes.load', ['items' => $items])->render();  
        }
        // Return a view and pass in the above variable

        return view('pistes.index', compact('items'))->withItems($items);

    }

    public function getSingle($slug) {

    	// Fetch from the database based on slug

    	$item = Item::where('slug', '=', $slug)->first();

    	// Return the view and pass in the post object

    	return view('pistes.single')->withItem($item);

    }
}
