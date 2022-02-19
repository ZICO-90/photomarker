<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentPhoto;

class GalleryController extends Controller
{
public function index()
{
    $gallery =   ParentPhoto::get();
    return view('users.gallery.gallery' ,compact('gallery'));
}

public function detalis($id)
{
    $gallery =   ParentPhoto::with('photos')->findorFail($id);
 
    return view('users.gallery.category' ,compact('gallery'));
}


}
