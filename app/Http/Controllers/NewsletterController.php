<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use Input;

class NewsletterController extends Controller
{
    public function newsletter(Request $request) {

	    $name = $request->name;
	    $email = $request->email;
	    $venue = $request->venue;

	    if(Newsletter::where('email', '=', $email)->first()) {
	    	echo '0';
	    }
	    else {
	    	$newsletter = new Newsletter;
	    	$newsletter->name = $name;
	    	$newsletter->email = $email;
	    	$newsletter->venue = $venue;
	    	$newsletter->save();
	    	echo '1';
		}

	}
}
