<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

    public function contact(){
    $first ="stijn";
    $last = "heynderickx";
    $people=["stijn","kruger", "anton", "thibeaut"];
    return view('pages.contact',compact('people'));
    }
}
