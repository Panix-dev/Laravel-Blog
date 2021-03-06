<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Item;
use App\Type;
use App\Itag;
use Session;
use Purifier;
use Image;
use Storage;

class ItemController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => array('favoriteItem', 'unFavoriteItem')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function favoriteItem(Item $item)
    {
        Auth::user()->favorites()->attach($item->id);

        return back();
    }

    public function unFavoriteItem(Item $item)
    {
        Auth::user()->favorites()->detach($item->id);

        return back();
    }

    public function index()
    {
        // Create a variable and sote all the blog posts in it from the database

        $items = Item::orderBy('id', 'desc')->paginate(15);

        // Return a view and pass in the above variable

        return view('items.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $itags = Itag::all();

        return view('items.create')->withTypes($types)->withItags($itags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        // validate the data

        $this->validate($request, array(
            'title'         => 'required|max:255',
            'pricing_body'  => 'required',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:items,slug',
            'body_1'        => 'required',
            'body_2'        => 'required',
            'body_3'        => 'required',
            'body_4'        => 'required',
            'type_id'       => 'required|integer',
            'weekdays'      => 'required|max:255',
            'google_map'    => 'required',
            'points_to_award' => 'required|integer',
            'featured_image' => 'sometimes|image',
            'featured_image_2' => 'sometimes|image',
            'meta_title'     => 'required|max:70',
            'meta_desscription' => 'required|max:160',
            'meta_keywords'  => 'required',
            'front_featured'     => '',
            'published'     => '',
            'list_teaser'     => 'required|max:195'
        ));

        // store in the database

        $item = new Item;
        $item->title = $request->title;
        $item->pricing_body = Purifier::clean($request->pricing_body);
        $item->slug = str_slug($request->slug, "-");
        $item->body_1 = Purifier::clean($request->body_1);
        $item->body_2 = Purifier::clean($request->body_2);
        $item->body_3 = Purifier::clean($request->body_3);
        $item->body_4 = Purifier::clean($request->body_4);
        $item->type_id = $request->type_id;
        $item->weekdays = $request->weekdays;
        $item->google_map = $request->google_map;
        $item->points_to_award = $request->points_to_award;
        $item->meta_title = $request->meta_title;
        $item->meta_desscription = $request->meta_desscription;
        $item->meta_keywords = $request->meta_keywords;
        $item->front_featured = $request->front_featured;
        $item->published = $request->published;
        $item->list_teaser = $request->list_teaser;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            $location_preset = public_path('image_preset/'.$filename);
            Image::make($image)->resize(702, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->crop(702,400)->save($location_preset);
        }

        if ($request->hasFile('featured_image_2')) {
            $image2 = $request->file('featured_image_2');
            $filename2 = time().'.'.$image2->getClientOriginalExtension();
            $location2 = public_path('images/'.$filename2);
            Image::make($image2)->resize(1920, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save($location2);
        }

        $item->image = $filename;
        $item->image2 = $filename2;

        $item->save();

        if(isset($request->itags)) {
            $item->itags()->sync($request->itags, false);
        } else {
            $item->itags()->sync(array());
        }

        Session::flash('success', 'The item was successfully saved!');

        // redirect to another page
        
        return redirect()->route('items.show', $item->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Item::where('slug', '=', $slug)->first();

        // Return the view and pass in the post object

        return view('items.show')->withItem($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the post in the database and save it as a variable

        $item = Item::find($id);
        $types = Type::all();
        $itags = Itag::all();

        $typelist = array();

        foreach ($types as $type) {
            $typelist[$type->id] = $type->name;
        }

        $itags2 = array();

        foreach ($itags as $itag) {
            $itags2[$itag->id] = $itag->name;
        }

        // Return the view and pass in the variable we previously created

        return view('items.edit')->withItem($item)->withTypelist($typelist)->withItags($itags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        $this->validate($request, array(
            'title'         => 'required|max:255',
            'pricing_body'  => 'required',
            'slug'          => "required|alpha_dash|min:5|max:255|unique:items,slug,$id",
            'body_1'        => 'required',
            'body_2'        => 'required',
            'body_3'        => 'required',
            'body_4'        => 'required',
            'type_id'       => 'required|integer',
            'weekdays'      => 'required|max:255',
            'google_map'    => 'required',
            'points_to_award' => 'required|integer',
            'featured_image' => 'sometimes|image',
            'featured_image_2' => 'sometimes|image',
            'meta_title'     => 'required|max:70',
            'meta_desscription' => 'required|max:160',
            'meta_keywords'  => 'required',
            'front_featured'     => '',
            'published'     => '',
            'list_teaser'     => 'required|max:195'
        ));

        // store in the database

        $item->title = $request->input('title');
        $item->pricing_body = Purifier::clean($request->input('pricing_body'));
        $item->slug = str_slug($request->input('slug'), "-");
        $item->body_1 = Purifier::clean($request->input('body_1'));
        $item->body_2 = Purifier::clean($request->input('body_2'));
        $item->body_3 = Purifier::clean($request->input('body_3'));
        $item->body_4 = Purifier::clean($request->input('body_4'));
        $item->type_id = $request->input('type_id');
        $item->weekdays = $request->input('weekdays');
        $item->google_map = $request->input('google_map');
        $item->points_to_award = $request->input('points_to_award');
        $item->meta_title = $request->input('meta_title');
        $item->meta_desscription = $request->input('meta_desscription');
        $item->meta_keywords = $request->input('meta_keywords');
        $item->front_featured = $request->input('front_featured');
        $item->published = $request->input('published');
        $item->list_teaser = $request->input('list_teaser');


        if($request->hasFile('featured_image')) {
            
            // Add the new photo
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            $location_preset = public_path('image_preset/'.$filename);
            Image::make($image)->resize(702, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->crop(702,400)->save($location_preset);

            $oldFilename = $item->image;

            // Update the database
            $item->image = $filename;

            // Delete the old photo
            Storage::delete($oldFilename);
        }

        if($request->hasFile('featured_image_2')) {
            
            // Add the new photo
            $image2 = $request->file('featured_image_2');
            $filename2 = time().'.'.$image2->getClientOriginalExtension();
            $location2 = public_path('images/'.$filename2);
            Image::make($image2)->resize(1920, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save($location2);

            $oldFilename2 = $item->image2;

            // Update the database
            $item->image2 = $filename2;

            // Delete the old photo
            Storage::delete($oldFilename2);
        }

        $item->save();

        if(isset($request->itags)) {
            $item->itags()->sync($request->itags, true);
        } else {
            $item->itags()->sync(array());
        }
        // redirect to another page with flash message

        Session::flash('success', 'The item page was successfully updated!');
        
        return redirect()->route('items.show', $item->slug);
    }

    public function delete($id)
    {
        $item = Item::find($id);

        return view('items.delete')->withItem($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $item->itags()->detach();

        Storage::delete($item->image);

        $item->delete();

        Session::flash('success', 'The item page was successfully deleted!');

        return redirect()->route('items.index');
    }
}
