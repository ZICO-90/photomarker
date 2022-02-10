<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TypeServiceController;



    
#-- begin Parent admin  groups 
Route::group(['prefix' => 'admin' , 'as' => 'admin.'],function(){
    
        Route::get('/',function(){ return view('admin.layouts-index');});

    #--begin services - child group
    Route::group(['prefix' => 'services' , 'as'=> 'services.'], function(){
        
        Route::get('/',[ServiceController::class,'index'])->name('index');
        Route::get('/create',[ServiceController::class,'create'])->name('create');
        Route::POST('/store/{id?}',[ServiceController::class,'CreateStore'])->name('store');
        Route::get('/edit{id}',[ServiceController::class,'edit'])->name('edit');
        Route::put('/update{id}',[ServiceController::class,'editUpdate'])->name('update');
        Route::get('/delete{id}',[ServiceController::class,'delete'])->name('delete');
        Route::get('/delete{id}',[ServiceController::class,'delete'])->name('delete');
        Route::get('/details/{id}',[ServiceController::class,'details'])->name('details');
        Route::get('/delete-details/{typeId}/{photoId}',[ServiceController::class,'deleteDetails'])->name('delete.details');

    }); #-- end services 




}); #--end Parent admin