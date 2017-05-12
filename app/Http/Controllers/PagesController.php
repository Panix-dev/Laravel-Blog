<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex() {
    	# Process variable data or params
    	# Talk to the model
    	# Receive from the model
    	# Compile or process data from the model if needed
    	# Pass that data to the correct view

        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();

    	return view('pages.welcome')->withPosts($posts);
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
    
    public function getBachelor() {
        return view('pages.bachelor');
    }

    public function getEkdiloseisXoroi() {
        return view('pages.ekdiloseisxoroi');
    }

    public function getEtairikesEkdiloseis() {
        return view('pages.etairikesekdiloseis');
    }

    public function getContact() {
    	return view('pages.contact');
    }

    public function postContact(Request $request) {
    	$this->validate($request, [
            'email'     => 'required|email',
            'message'   => 'min:10',
            'subject'   => 'min:3'
        ]);

        $data = array(
            'email'         => $request->email,
            'subject'       => $request->subject,
            'bodyMessage'   => $request->message
            );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('pagapiou@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was Sent!');

        // redirect to another page
        
        return redirect('/');
    }
}
