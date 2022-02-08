<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
class HomController extends Controller
{
   public function lang($locale){

     // dd($locale);

        App::setlocale($locale) ;
        session()->put('locale',$locale);

        return redirect()->back();


   }
}
