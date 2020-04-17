<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    function showIndex() 
    {
        echo "Controller created";
        return view('index');
    }
}
