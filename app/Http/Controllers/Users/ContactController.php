<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequset;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
   public function index()
   {
      $service = Service::with('Type_services' , 'Service_Photoes')->get();
      
      return  view('users.contact.index',compact('service'));
   }


   public function store(StoreServiceRequset $request)
   {
    //512M
    //max_execution_time=1800

   
       

       
      if(empty($request->Type_services)){
         return redirect()->back()->with(['error' => 'اختار خدمه علي الافل']);
      }
    
      if($request->has('FILES'))
      {
         $file_path = Storage::disk('public')->putFile('images/contacts',$request->FILES);
         $request->FILES = $file_path; 
      }
    
     
     
      if($request->has('other')){
        
        if(empty($request->other_value))
        return redirect()->back()->with(['error' => 'اختار خدمه علي الافل']);

        $photo_service = [] ;
        for($index = 0 ; $index < count($request['Type_services']) ; $index++ )
        {
            
          array_push($photo_service , $request['Type_services'][$index]);
        }

        array_push($photo_service , $request->other_value[$request->other[0]]);
        
        $request['Type_services'] = $photo_service;
      }
      
    

         try{
        //  dd($Type_services_array);
      

            DB::beginTransaction();
               $Contacts = Contact::create([
                                 'company_nam' => $request->company_nam,
                                 'activity_type' => $request->activity_type,
                                 'number_call' => $request->number_call,
                                 'email' => $request->email,
                                 'file_url' => $request->FILES ,
                                 'servieces' => $request->Type_services ,
               ]) ;
             

           ///    $Contacts->contact_orders()->createMany($insertArray);

               

            DB::commit();
           

            return redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
         }
         catch(\Exception $ex)
         {
           
            DB::rollback();
            Storage::disk('public')->delete($request->FILES);
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
         }
      
   } #-- end store


}
