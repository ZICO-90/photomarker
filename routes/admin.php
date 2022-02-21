<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TypeServiceController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\admin\PhotosController;
use App\Http\Controllers\admin\AboutsController;
use App\Http\Controllers\admin\CustmoresController;
use App\Http\Controllers\admin\SiteSettingsController;
use App\Http\Controllers\admin\ManagementsConstroller;
use App\Http\Controllers\admin\SiteServicestsConstroller;
use App\Http\Controllers\admin\SlidersController;


use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminForgotPasswordLoginController;
use App\Http\Controllers\admin\auth\AdminResetPasswordLoginController;

use App\Http\Controllers\Users\SubscribeController;


#-- begin login
Route::get('/login',[AdminLoginController::class , 'ShowLoginForm'])->name('admin.login');
Route::post('/join',[AdminLoginController::class , 'login'])->name('admin.join');
Route::get('/logout',[AdminLoginController::class , 'logout'])->name('admin.logout');
#-- end login


#-- begin password reset 
Route::get('/password/email',[AdminForgotPasswordLoginController::class , 'ShowEmailForm'])->name('admin.password.email');
Route::post('/password/reset/send',[AdminForgotPasswordLoginController::class , 'sendLinkEmail'])->name('admin.password.send.link');
Route::post('/password/reset',[AdminResetPasswordLoginController::class , 'reset'])->name('password.update');
Route::get('/password/reset/{token}',[AdminResetPasswordLoginController::class , 'showResetForm'])->name('admin.password.reset');
#-- end password reset 

    
#-- begin Parent admin  groups 
Route::group(['prefix' => 'admin' , 'as' => 'admin.' , 'middleware' =>'auth.admin:admin'],function(){
    
        Route::get('/',function(){ return view('admin.layouts-index');})->name('index');

    #--begin services - child group
    Route::group(['prefix' => 'services' , 'as'=> 'services.'], function(){
        
        Route::get('/',[ServiceController::class,'index'])->name('index');
        Route::get('/create',[ServiceController::class,'create'])->name('create');
        Route::POST('/store/{id?}',[ServiceController::class,'CreateStore'])->name('store');
        Route::get('/edit{id}',[ServiceController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[ServiceController::class,'editUpdate'])->name('update');
        Route::get('/delete/{id}',[ServiceController::class,'delete'])->name('delete');
        Route::get('/delete/{id}',[ServiceController::class,'delete'])->name('delete');
        Route::get('/details/{id}',[ServiceController::class,'details'])->name('details');
        Route::get('/delete-details/{typeId}',[ServiceController::class,'deleteDetails'])->name('delete.details');

    }); #-- end services 

     #--begin contacts 
    Route::group(['prefix' => 'contacts' , 'as'=> 'contacts.'], function(){
        
        Route::get('/',[ContactsController::class,'index'])->name('index');
        Route::get('/details/{id}',[ContactsController::class,'details'])->name('details');
        Route::get('/delete/{id}',[ContactsController::class,'delete'])->name('delete');

     }); #--end contacts


       #--begin sliders 
    Route::group(['prefix' => 'sliders' , 'as'=> 'sliders.'], function(){
        
        Route::get('/',[SlidersController::class,'index'])->name('index');
        Route::get('/create',[SlidersController::class,'create'])->name('create');
        Route::post('/store',[SlidersController::class,'store'])->name('store');
        Route::put('/update/{id}',[SlidersController::class,'update'])->name('update');
        Route::get('/delete/{id}',[SlidersController::class,'delete'])->name('delete');
        Route::get('/status/{id}/{bool}',[SlidersController::class,'status'])->name('status');


     }); #--end sliders

             # begin Subscribes
             Route::group(['prefix' => 'Subscribes' , 'as'=> 'Subscribes.'], function(){

                Route::get('/' ,[SubscribeController::class,'index']) ->name('index');
                Route::get('/delete/{id}',[SubscribeController::class,'delete'])->name('delete');

           });#-- end Subscribes


     #--begin abouts
    Route::group(['prefix' => 'abouts' , 'as'=> 'abouts.'], function(){
        
        Route::get('/',[AboutsController::class,'index'])->name('index');
        Route::get('/create',[AboutsController::class,'create'])->name('create');
        Route::post('/store',[AboutsController::class,'store'])->name('store');
        Route::get('/edit/{id}',[AboutsController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[AboutsController::class,'update'])->name('update');
        Route::get('/delete/{id}',[AboutsController::class,'delete'])->name('delete');
        Route::get('/status/{id}/{bool}',[AboutsController::class,'status'])->name('status');
       

     }); #--end abouts


      #--begin site-services
    Route::group(['prefix' => 'site-services' , 'as'=> 'site.services.'], function(){
        
        Route::get('/',[SiteServicestsConstroller::class,'index'])->name('index');
        Route::get('/create',[SiteServicestsConstroller::class,'create'])->name('create');
        Route::post('/store',[SiteServicestsConstroller::class,'store'])->name('store');
        Route::get('/edit/{id}',[SiteServicestsConstroller::class,'edit'])->name('edit');
        Route::put('/update/{id}',[SiteServicestsConstroller::class,'update'])->name('update');
        Route::get('/delete/{id}',[SiteServicestsConstroller::class,'delete'])->name('delete');
        Route::get('/status/{id}/{bool}',[SiteServicestsConstroller::class,'status'])->name('status');
       

     }); #--end site-services

       #--begin custmores 
    Route::group(['prefix' => 'custmores' , 'as'=> 'custmores.'], function(){
        
        Route::get('/',[CustmoresController::class,'index'])->name('index');
        Route::get('/create',[CustmoresController::class,'create'])->name('create');
        Route::post('/store',[CustmoresController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CustmoresController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[CustmoresController::class,'update'])->name('update');
        Route::get('/delete/{id}',[CustmoresController::class,'delete'])->name('delete');
        Route::get('/status/{id}/{bool}',[CustmoresController::class,'status'])->name('status');
       

     }); #--end custmores


       #--begin site-settings 
    Route::group(['prefix' => 'site-settings' , 'as'=> 'site.settings.'], function(){
        
        Route::get('/',[SiteSettingsController::class,'index'])->name('index');
        Route::get('/create',[SiteSettingsController::class,'create'])->name('create');
        Route::post('/store',[SiteSettingsController::class,'store'])->name('store');
        Route::get('/status/{id}/{bool}',[SiteSettingsController::class,'status'])->name('status');
        Route::get('/edit/{id}',[SiteSettingsController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[SiteSettingsController::class,'update'])->name('update');
        Route::get('/delete/{id}',[SiteSettingsController::class,'delete'])->name('delete');
       

     }); #--end site-settings


    #--begin managements  crud admin
    Route::group(['prefix' => 'managements' , 'as'=> 'managements.'], function(){

        Route::get('/',[ManagementsConstroller::class,'index'])->name('index');
        Route::get('/create',[ManagementsConstroller::class,'create'])->name('create');
        Route::post('/store',[ManagementsConstroller::class,'store'])->name('store');
        Route::get('/edit/{id}',[ManagementsConstroller::class,'edit'])->name('edit');
        Route::put('/update/{id}',[ManagementsConstroller::class,'update'])->name('update');
        Route::get('/delete/{id}',[ManagementsConstroller::class,'delete'])->name('delete');

    }); #--end managements

    #--begin photos 
    Route::group(['prefix' => 'photos' , 'as'=> 'photos.'], function(){
        
        Route::get('/',[PhotosController::class,'index'])->name('index');
        Route::get('/create',[PhotosController::class,'create'])->name('create');
        Route::post('/store',[PhotosController::class,'store'])->name('store');

        Route::get('/master-edit/{id}',[PhotosController::class,'editMaster'])->name('master.edit');
        Route::PUT('/master-update/{id}',[PhotosController::class,'MasterUpdate'])->name('master.update');
        Route::get('/delete-master/{id}',[PhotosController::class,'deleteMaster'])->name('delete.master');

        Route::get('/details/{id}',[PhotosController::class,'details'])->name('details');
        Route::post('/details-update/{id}',[PhotosController::class,'ChidUpdate'])->name('details.update');
        Route::get('/delete/{id}',[PhotosController::class,'delete'])->name('delete');

     }); #--end photos

}); #--end Parent admin