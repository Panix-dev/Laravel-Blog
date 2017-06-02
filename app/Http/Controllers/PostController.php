<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a variable and sote all the blog posts in it from the database

        $posts = Post::orderBy('id', 'desc')->paginate(5);

        // Return a view and pass in the above variable

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'          => 'required',
            'category_id'   => 'required|integer',
            'featured_image' => 'sometimes|image',
            'meta_title'     => 'required|max:70',
            'meta_desscription' => 'required|max:160',
            'meta_keywords'  => 'required'
        ));

        // store in the database

        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->slug, "-");
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;
        $post->meta_title = $request->meta_title;
        $post->meta_desscription = $request->meta_desscription;
        $post->meta_keywords = $request->meta_keywords;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
        }

        $post->image = $filename;

        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags, false);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'The blog post was successfully saved!');

        // redirect to another page
        
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
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

        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        $cats = array();

        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags2 = array();

        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        // Return the view and pass in the variable we previously created

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
        $post = Post::find($id);

        $this->validate($request, array(
            'title'        => 'required|max:255',
            'slug'         => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'body'         => 'required',
            'category_id'  => 'required|integer',
            'featured_image'  => 'image',
            'meta_title'     => 'required|max:70',
            'meta_desscription' => 'required|max:160',
            'meta_keywords'  => 'required'
        ));

        // store in the database

        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('slug'), "-");
        $post->body = Purifier::clean($request->input('body'));
        $post->category_id = $request->input('category_id');
        $post->meta_title = $request->input('meta_title');
        $post->meta_desscription = $request->input('meta_desscription');
        $post->meta_keywords = $request->input('meta_keywords');

        if($request->hasFile('featured_image')) {
            
            // Add the new photo
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $oldFilename = $post->image;

            // Update the database
            $post->image = $filename;

            // Delete the old photo
            Storage::delete($oldFilename);
        }

        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags, true);
        } else {
            $post->tags()->sync(array());
        }

        // redirect to another page with flash message

        Session::flash('success', 'The blog post was successfully updated!');
        
        return redirect()->route('posts.show', $post->id);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        return view('posts.delete')->withPost($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted!');

        return redirect()->route('posts.index');

    }
}
