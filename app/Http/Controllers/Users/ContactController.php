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

        $insertArray = [];

       
      if(count($request->Type_services) >= count($request->Service_Photoes) ){


            for($index = 0 ; $index < count($request->Type_services)  ;$index++)
            {

              array_push($insertArray , ['type_service_id' =>  $request->Type_services[$index] , 'type_service_photos_id' => !isset($request->Service_Photoes[$index])== -1?  null : $request->Service_Photoes[$index] ]);
            }

      }
      else
      {
         return redirect()->back()->with(['error' => 'يجب ان يكون البيانات الصور اقل او تساوي القيم الاخري']);

      }

      

  
      if($request->has('FILES'))
      {
         $file_path = Storage::disk('public')->putFile('images/contacts',$request->FILES);
         $request->FILES = $file_path; 
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
               ]) ;
             

               $Contacts->contact_orders()->createMany($insertArray);

               

            DB::commit();
           

            return redirect()->back()->with(['success' => 'تم الحفظ بنجاح']);
         }
         catch(\Exception $ex)
         {
           
            DB::rollback();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
         }
      
   } #-- end store


}
