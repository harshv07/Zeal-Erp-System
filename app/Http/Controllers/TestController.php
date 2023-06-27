<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function test()
    {
        return view('profile.edit2');
    }

    public function check()
    {
        return view('index');
    }
}
