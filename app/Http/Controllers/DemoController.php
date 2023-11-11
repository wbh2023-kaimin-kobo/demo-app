<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function first()
    {
        return view('first');
    }

    public function second()
    {
        return view('second');
    }
}
