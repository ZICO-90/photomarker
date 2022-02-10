<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomController;

#-- begin users  Controllers
use App\Http\Controllers\Users\ContactController;
use App\Http\Controllers\Users\AboutMeController;
use App\Http\Controllers\Users\GalleryController;
use App\Http\Controllers\Users\ServicesController;
#-- end users  Controllers

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

#-- Begin Home Pages index



  Route::get('/' ,function(){

                return view('users.layouts.layout');
            
                })->name('homePage'); #-- end Home pages index



Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.available_locales'))) {
      session(['locale' => $locale]);
    }
    return redirect()->back();
  })->name('language');





#-- begin Parent  Gorup home
Route::group(['prefix' => 'home' , 'as' => 'users.'],function(){
            
          
            #-- begin-chlid contact
            Route::group(['prefix' =>  'contact' ,  'as'=> 'contact.'],function(){
                Route::get('/',[ContactController::class,'index'])->name('index');
                Route::POST('/store',[ContactController::class,'store'])->name('store');
            }); #-- end-chlid contact
        
            # begin-chlid-abdout-me group
            Route::group(['prefix' => 'about-me' , 'as'=> 'abouts.'], function(){
                Route::get('/' ,[AboutMeController::class,'index']) ->name('index');
             
            });#-- end child about me 
        
        
             # begin-chlid-abdout-me group
             Route::group(['prefix' => 'gallery' , 'as'=> 'gallery.'], function(){
        
                Route::get('/' ,[GalleryController::class,'index']) ->name('index');
            });#-- end child about me
            
            
            #begin-chlid-service group
            Route::group(['prefix'=> 'services' , 'as' => 'services.'] ,function(){
                
                Route::get('/' ,[ServicesController::class,'index']) ->name('index');
        
            }); #--end child service group
        
        
}); #-- end Parent  home



