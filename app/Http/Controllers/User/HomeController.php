<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Card;
use App\Models\Header;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index()
    {
        $abouts = About::all();
        $cards = Card::all();
        $headers = Header::all();
        return view('pages.user.home',compact('abouts','cards','headers'));
    }
}
