<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteService;
class ServicesController extends Controller
{
    public function index()
    {
       $site_service = SiteService::where('active' , 1)->get();
        return view('users.services.services',compact('site_service'));
        
    }
}
