<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view ('welcome');
    }

    public function About(){
        return view ('about');
    }

    public function Contact(){
        return view ('contact');
    }

    public function Service(){
        return view ('services');
    }

    public function Package(){
        return view ('package');
    }


}
