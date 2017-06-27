<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Item;
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

        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $items = Item::orderBy('id', 'desc')->where('front_featured', '=', '1')->limit(9)->get();

    	return view('pages.welcome')->withPosts($posts)->withItems($items);
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

    public function getPaymentsPage() {
        return view('pages.paymentpage');
    }

    public function getEtairikesEkdiloseis() {
        return view('pages.etairikesekdiloseis');
    }

    public function getPrivacyPage() {
        return view('pages.privacypage');
    }

    public function getContact() {
        $items = Item::all();
    	return view('pages.contact')->withItems($items);
    }

    public function postContact(Request $request) {
    	$this->validate($request, [
            'name'      => 'required',
            'phone'      => 'required',
            'email'     => 'required|email',
            'message'   => 'min:10'
        ]);

        $data = array(
            'name'              => $request->name,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'bodyMessage'           => $request->message,
            'venue_interest'    => $request->venue_interest,
            'people'            => $request->people,
            'offer'             => $request->offer,
            'items'             => $request->items,
            'date'              => $request->date,
            );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('pagapiou@gmail.com');
            $message->subject('Συμπλήρωη φόρμας επικοινωνίας');
        });

        Session::flash('success', 'Το email σας εστάλη με επιτυχία. Σύντομα θα επικοινωνήσουμε μαζί σας.');

        // redirect to another page
        
        return redirect('/');
    }
}
