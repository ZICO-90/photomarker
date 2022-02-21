<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
class SubscribeController extends Controller
{
    #--------- users start

   public function store(Request $re)
   {
    $rules = [
                    
        'E-mail' => 'required|email',
     
        
    ];

    $message =[
        'required.E-mail' => 'البريد الالكتروني مطلوب',
    ];

    $data =  $this->validate($re ,$rules , $message );

    Subscribe::create(['email' => $data['E-mail']]);
    return redirect()->back()->with(['success' => 'تم الاشتراك بنجاح']);


   }


   #------------------- dashboards start
   public function index()
   {
          $Subscribe = Subscribe::get();

          return view('admin.subscribes.index',compact('Subscribe'));


   }

   public function delete($id)
   {
       $Subscribe = Subscribe::findorFail($id);
       $Subscribe->delete();
       return redirect()->route('admin.Subscribes.index')->with(['success' => "تم الحذف بنجاح"]);

   }#-- end delete


}
