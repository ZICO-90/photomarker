<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Custmore;
use App\Models\SiteSetting;

class AboutMeController extends Controller
{
    public function index(){
      
        $Custmore = Custmore::where('active',1)->get();
        $about_setting = \App\Models\SiteSetting::where('active' ,1)->first();

        return view('users.about-me.about',compact('Custmore','about_setting'));
       
     }
}
