<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

use App\Support\Collection;

use App\Item;
use App\Type;
use App\User;
use App\Favorite;
use App\Itag;

class PistesController extends Controller
{
	public function getIndex(Request $request) {

        $it_ids = [];
        $fav_ids = [];
        $result = [];
        $sorting = [];

        // Fetch from the database based on slug
        if (Auth::check()) {

            $items = Item::orderBy('id', 'desc')->where('type_id', '=', '1')->where('published', '=', '1')->get();
            $favorites = Auth::user()->favorites;

            foreach($items as $key => $i) {
                array_push($it_ids, $i->id);
                foreach($favorites as $fav) {
                    if ($fav->id == $i->id) {
                        array_push($fav_ids, $fav->id);
                    }
                }
            }

            $result = array_diff($it_ids, $fav_ids);
            $sorting = array_merge($fav_ids, $result);
            $items = $items->sortBy(function($model) use ($sorting) {
                return array_search($model->getKey(), $sorting);
            });

   

            $items = ( new Collection( $items ) )->paginate( 9 );

        } 
        else {
            $items = Item::orderBy('id', 'desc')->where('type_id', '=', '1')->where('published', '=', '1')->paginate(9);
        }
        
        if ($request->ajax()) {
            return view('pistes.load', ['items' => $items])->render();  
        }
        // Return a view and pass in the above variable

        $temp_array = array(); 
        $i = 0; 

        foreach ($items as $item) {
            foreach ($item->itags as $itag) {
                $temp_array[$itag->id] = $itag->name;
                $i++;
            }
        }
        $result = array_unique($temp_array);

        return view('pistes.index', compact('items'))->withItems($items)->withResult($result);

    }

    public function getSingle($slug) {

    	// Fetch from the database based on slug

    	$item = Item::where('slug', '=', $slug)->first();

    	// Return the view and pass in the post object

    	return view('pistes.single')->withItem($item);

    }
}
