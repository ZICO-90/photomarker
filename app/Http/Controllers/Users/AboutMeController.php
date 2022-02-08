<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    public function index(){


        return view('users.about-me.about');
        //resources\views\users\about-me\about.blade.php
     }
}
