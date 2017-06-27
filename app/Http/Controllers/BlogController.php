<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class BlogController extends Controller
{
	public function getIndex(Request $request) {

    	// Fetch from the database based on slug
        $tags = Tag::all();

    	$posts = Post::orderBy('id', 'desc')->paginate(5);

        $populars = Post::orderBy('id', 'desc')->where('popular_post', '=', '1')->limit(3)->get();
        
        if ($request->ajax()) {
            return view('blog.load', ['posts' => $posts])->render();  
        }
        // Return a view and pass in the above variable

        return view('blog.index', compact('posts'))->withPosts($posts)->withTags($tags)->withPopulars($populars);

    }

    public function getSingle($slug) {

    	// Fetch from the database based on slug

        $tags = Tag::all();

    	$post = Post::where('slug', '=', $slug)->first();

    	// Return the view and pass in the post object

    	return view('blog.single')->withPost($post)->withTags($tags);

    }
}
