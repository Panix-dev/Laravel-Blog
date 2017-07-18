<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Itag;
use App\Item;
use Session;

class ItagController extends Controller
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
        $itags = Itag::all();

        return view('itags.index')->withItags($itags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save a new itag and then redirect back to index
        $this->validate($request, array(
                'name' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:itags,slug',
                'meta_title'     => 'required|max:70',
                'meta_desscription' => 'required|max:160',
                'meta_keywords'  => 'required'
            ));

        $itag = new Itag;

        $itag->name = $request->name;
        $itag->slug = str_slug($request->slug, "-");
        $itag->meta_title = $request->meta_title;
        $itag->meta_desscription = $request->meta_desscription;
        $itag->meta_keywords = $request->meta_keywords;
        $itag->save();

        Session::flash('success', 'The new itag was successfully created!');

        // redirect to another page
        
        return redirect()->route('itags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $itag = Itag::where('slug', '=', $slug)->first();

        $items = $itag->items()->orderBy('item_itag.item_id', 'desc')->paginate(9);
 
       // return view('tags.show')->withTag($tag)->withPosts($posts);

        if ($request->ajax()) {
            //return view('bars.load', ['items' => $items])->render();  
            return view('itags.load', ['items' => $items])->render(); 
        }
        // Return a view and pass in the above variable
        return view('itags.show')->withItag($itag)->withItems($items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itag = Itag::find($id);

        // Return the view and pass in the variable we previously created

        return view('itags.edit')->withItag($itag);
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
        $itag = Itag::find($id);

        // Validate the data 
        $this->validate($request, array(
            'name'  => 'required|max:255',
            'slug'         => "required|alpha_dash|min:5|max:255|unique:itags,slug,$id",
            'meta_title'     => 'required|max:70',
            'meta_desscription' => 'required|max:160',
            'meta_keywords'  => 'required'
        ));

        // store in the database

        $itag->name = $request->input('name');
        $itag->slug = str_slug($request->input('slug'), "-");
        $itag->meta_title = $request->input('meta_title');
        $itag->meta_desscription = $request->input('meta_desscription');
        $itag->meta_keywords = $request->input('meta_keywords');
        $itag->save();

        // redirect to another page with flash message

        Session::flash('success', 'The itag was successfully updated!');
        
        return redirect()->route('itags.index');
    }

    public function delete($id)
    {
        $itag = Itag::find($id);

        return view('itags.delete')->withItag($itag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itag = Itag::find($id);

        $itag->items()->detach();

        $itag->delete();

        Session::flash('success', 'The itag was successfully deleted!');

        return redirect()->route('itags.index');
    }
}
