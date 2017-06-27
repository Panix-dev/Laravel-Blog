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

class ClubsController extends Controller
{
	public function getIndex(Request $request) {

        // Fetch from the database based on slug
        if (Auth::check()) {

            $it_ids = [];
            $fav_ids = [];
            $result = [];
            $sorting = [];
            
            $items = Item::orderBy('id', 'desc')->where('type_id', '=', '2')->get();
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

   

            $items = ( new Collection( $items ) )->paginate( 6 );

        } 
        else {
            $items = Item::orderBy('id', 'desc')->where('type_id', '=', '2')->paginate(6);
        }
        
        if ($request->ajax()) {
            return view('clubs.load', ['items' => $items])->render();  
        }

        $temp_array = array(); 
        $i = 0; 

        foreach ($items as $item) {
            foreach ($item->itags as $itag) {
                $temp_array[$itag->id] = $itag->name;
                $i++;
            }
        }
        $result = array_unique($temp_array);

        return view('clubs.index', compact('items'))->withItems($items)->withResult($result);

    }

    public function getSingle($slug) {

    	// Fetch from the database based on slug

    	$item = Item::where('slug', '=', $slug)->first();

    	// Return the view and pass in the post object

    	return view('clubs.single')->withItem($item);

    }
}
