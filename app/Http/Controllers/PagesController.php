<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex() {
    	# Process variable data or params
    	# Talk to the model
    	# Receive from the model
    	# Compile or process data from the model if needed
    	# Pass that data to the correct view

    	return view('pages.welcome');
    }

    public function getAbout() {
    	$first = 'Panagiotis';
    	$last = 'Agapiou';
    	$fullname = $first . " " . $last;
    	$email = 'pagapiou@mail.com';

    	$data = [];
    	$data['email'] = $email;
    	$data['fullname'] = $fullname;

		return view('pages.about')->withData($data);
    }

    public function getContact() {
    	return view('pages.contact');
    }

    public function postContact() {
    	
    }
}
