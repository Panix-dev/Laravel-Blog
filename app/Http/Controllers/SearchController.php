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

class SearchController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => array('filterReset', 'filter')]);
    }
    
    public function filterReset(Request $request, Item $item)
    {
        $it_ids = [];
        $fav_ids = [];
        $result = [];
        $sorting = [];

        // Fetch from the database based on slug
        if (Auth::check()) {

           // $itag = Itag::where('id', $request->input('itag_id'))->first();

            //$items = $itag->items()->orderBy('item_itag.item_id', 'desc')->where('type_id', $request->input('type_id'))->get();

            $items = Item::orderBy('id', 'desc')->where('type_id', $request->input('type_id'))->where('published', '=', '1')->get();

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

            $items = ( new Collection( $items ) )->paginate( 6 )->appends('type_id', $request->input('type_id'));

        } 
        else {
           $items = Item::orderBy('id', 'desc')->where('type_id', $request->input('type_id'))->where('published', '=', '1')->paginate(6)->appends('type_id', $request->input('type_id'));
           //$items = $itag->items()->orderBy('item_itag.item_id', 'desc')->where('type_id', $request->input('type_id'))->paginate(6);
        }
        
        if ($request->ajax()) {
            if($request->input('type_id') == 1) {
                return view('pistes.load', ['items' => $items])->render();  
            }
            elseif($request->input('type_id') == 2) {
                return view('clubs.load', ['items' => $items])->render();  
            }
            else {
                return view('bars.load', ['items' => $items])->render();  
            }
            
        }
        // Return a view and pass in the above variable

        if($request->input('type_id') == 1) {
            return view('pistes.index', compact('items'))->withItems($items);
        }
        elseif($request->input('type_id') == 2) {
            return view('clubs.index', compact('items'))->withItems($items);
        }
        else {
            return view('bars.index', compact('items'))->withItems($items);
        }
    }

    public function filter(Request $request, Item $item)
    {

        $itag = Itag::where('id', $request->input('itag_id'))->first();

        $it_ids = [];
        $fav_ids = [];
        $result = [];
        $sorting = [];

	    // Fetch from the database based on slug
        if (Auth::check()) {

        	$items = $itag->items()->orderBy('item_itag.item_id', 'desc')->where('type_id', $request->input('type_id'))->where('published', '=', '1')->get();

            //$items = Item::orderBy('id', 'desc')->where('type_id', $request->input('type_id'))->get();

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

            $items = ( new Collection( $items ) )->paginate( 6 )->appends('type_id', $request->input('type_id'));

        } 
        else {
           //$items = Item::orderBy('id', 'desc')->where('type_id', $request->input('type_id'))->paginate(6)->appends('type_id', $request->input('type_id'));
           $items = $itag->items()->orderBy('item_itag.item_id', 'desc')->where('type_id', $request->input('type_id'))->where('published', '=', '1')->paginate(6);
        }
        
        if ($request->ajax()) {
        	if($request->input('type_id') == 1) {
        		return view('pistes.load', ['items' => $items])->render();  
        	}
        	elseif($request->input('type_id') == 2) {
        		return view('clubs.load', ['items' => $items])->render();  
        	}
        	else {
        		return view('bars.load', ['items' => $items])->render();  
        	}
            
        }
        // Return a view and pass in the above variable

        if($request->input('type_id') == 1) {
    		return view('pistes.index', compact('items'))->withItems($items);
    	}
    	elseif($request->input('type_id') == 2) {
    		return view('clubs.index', compact('items'))->withItems($items);
    	}
    	else {
    		return view('bars.index', compact('items'))->withItems($items);
    	}
    }
}
