<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    //
    public function index()
    {
        return view('home', [
            'tweets' => Auth::user()->timeline()
        ]);
    }
}
