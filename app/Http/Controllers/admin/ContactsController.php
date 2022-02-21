<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        $Contacts =  Contact::get();
  //dd(count($Contacts[2]->servieces));
        return view('admin.contacts.index',compact('Contacts')) ;
    }

    public function details($id)
    {
     
        $Contacts =  Contact::findorFail($id);
      

        return view('admin.contacts.details',compact('Contacts')) ;

    }


    

    public function delete($id)
    {
        $Contact =  Contact::findorFail($id);

        if($Contact->delete())
        return redirect()->back()->with(['success'=> 'تم حذف العنصر بنجاح']);
        else
        return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    } #-- end delete



}
