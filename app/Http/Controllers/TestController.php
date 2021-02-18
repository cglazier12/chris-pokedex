<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        //load the helloworld page
        return view('helloworld');
    }
}
