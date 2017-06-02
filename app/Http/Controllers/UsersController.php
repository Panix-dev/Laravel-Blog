<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function myFavorites()
	{
	    $myFavorites = Auth::user()->favorites;

	    return view('favorites.index', compact('myFavorites'));
	}
}
