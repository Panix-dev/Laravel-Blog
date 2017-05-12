<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Itag;
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
            ));

        $itag = new Itag;

        $itag->name = $request->name;
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
    public function show($id)
    {
        $itag = Itag::find($id);
        return view('itags.show')->withItag($itag);
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
            'name'  => 'required|max:255'
        ));

        // store in the database

        $itag->name = $request->input('name');

        $itag->save();

        // redirect to another page with flash message

        Session::flash('success', 'The itag was successfully updated!');
        
        return redirect()->route('itags.show', $itag->id);
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
