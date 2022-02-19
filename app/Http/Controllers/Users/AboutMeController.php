<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Custmore;
class AboutMeController extends Controller
{
    public function index(){
      
        $Custmore = Custmore::where('active',1)->get();
       
    

        return view('users.about-me.about',compact('Custmore'));
        //resources\views\users\about-me\about.blade.php
     }
}
