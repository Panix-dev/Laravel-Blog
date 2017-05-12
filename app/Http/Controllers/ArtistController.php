<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Artist;
use App\Item;
use Session;
use Purifier;
use Image;
use Storage;

class ArtistController extends Controller
{
    public function __construct() {
        $this->middleware('admin', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $artists = Artist::orderBy('id', 'desc')->paginate(5);

        return view('artists.index')->withArtists($artists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('artists.create')->withItems($items);
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
            'name'          => 'required|max:255',
            'body'          => 'required',
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:artists,slug',
            'featured_image' => 'sometimes|image',
            'meta_title'     => 'required|max:70',
            'meta_desscription' => 'required|max:160',
            'meta_keywords'  => 'required'
        ));

        // store in the database

        $artist = new Artist;
        $artist->name = $request->name;
        $artist->body = Purifier::clean($request->body);
        $artist->slug = str_slug($request->slug, "-");
        $artist->item_id = $request->item_id;
        $artist->meta_title = $request->meta_title;
        $artist->meta_desscription = $request->meta_desscription;
        $artist->meta_keywords = $request->meta_keywords;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
        }

        $artist->image = $filename;

        $artist->save();

        Session::flash('success', 'The artist page was successfully saved!');

        // redirect to another page
        
        return redirect()->route('artists.show', $artist->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $artist = Artist::where('slug', '=', $slug)->first();

        // Return the view and pass in the post object

        return view('artists.show')->withArtist($artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::all();
        $artist = Artist::find($id);

        $itemlist = array();

        foreach ($items as $item) {
            $itemlist[$item->id] = $item->title;
        }

        return view('artists.edit')->withArtist($artist)->withItemlist($itemlist);
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
        $artist = Artist::find($id);

        $this->validate($request, array(
            'name'          => 'required|max:255',
            'body'          => 'required',
            'slug'          => "required|alpha_dash|min:5|max:255|unique:artists,slug,$id",
            'featured_image' => 'sometimes|image',
            'meta_title'     => 'required|max:70',
            'meta_desscription' => 'required|max:160',
            'meta_keywords'  => 'required'
        ));

        // store in the database

        $artist->name = $request->input('name');
        $artist->slug = str_slug($request->input('slug'), "-");
        $artist->body = Purifier::clean($request->input('body'));
        $artist->item_id = $request->input('item_id');
        $artist->meta_title = $request->input('meta_title');
        $artist->meta_desscription = $request->input('meta_desscription');
        $artist->meta_keywords = $request->input('meta_keywords');

        if($request->hasFile('featured_image')) {
            
            // Add the new photo
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldFilename = $artist->image;

            // Update the database
            $artist->image = $filename;

            // Delete the old photo
            Storage::delete($oldFilename);
        }

        $artist->save();

        // redirect to another page with flash message

        Session::flash('success', 'The artist page was successfully updated!');
        
        return redirect()->route('artists.show', $artist->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);

        Storage::delete($artist->image);

        $artist->delete();

        Session::flash('success', 'The artist page was successfully deleted!');

        return redirect()->route('artists.index');
    }
}
