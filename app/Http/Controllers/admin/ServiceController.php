<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\TypeService;
use App\Models\TypeServicePhoto;
use Illuminate\Support\Facades\DB;
class ServiceController extends Controller
{
    public function index()
    {
      $service =  Service::with('Type_services')->get();
 
       return view('admin.services.index',compact('service'));

    
    } #-- end index

    public function create()
    {
       
        return view('admin.services.create');

    } #-- end create

    public function CreateStore(Request $re ,$id = null)
    {
        $rules = [
         
            
          
            'type_service' => 'required|array|min:1|max:10',
            'type_service.*' => 'required|string|min:3|max:120',
            'name' => 'required|string|min:3|max:120',
        ];
      
        $message = [
            'required' => 'هذا الحقل مطلوب',
            'required.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
            'required.max' => 'يجب إلا يزيد عدد الاحرف عن 120 حرفا',
            'name.string' => 'يجب ان يكون نصي',
            'name.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
            'name.max'=> 'يجب ان لا يزيد عن 120 حرفا',

        ];

       
   $date =  $this->validate($re,$rules,$message);
  
 
        $type_service = [];
       
        if(empty($id))
        {
            for($index = 0 ; $index < count($date['type_service']) ; $index++ )
            {
                if($date['type_service'][$index] != null)
                 array_push($type_service , ['type_name' => $date['type_service'][$index] ]);
            }
        }
         else
        {
            for($index = 0 ; $index < count($date['type_service']) ; $index++ )
            {
                if($date['type_service'][$index] != null)
                    array_push($type_service , ['type_name' => $date['type_service'][$index] ]);
                
            }
        }
    
         

        
       try
        {
            $Service  = null ;

            if(empty($id))
            {
                $Service =    Service::create(['name' => $date['name']]);
                $Service->Type_services()->createMany($type_service);
                return redirect()->route('admin.services.index')->with(['success'=> 'تم  الاضافة بنجاح']);

            } 
            else
            {
                $Service =  Service::findorFail($id);
                    if(count($type_service) > 0)
                    $Service->Type_services()->createMany($type_service);
                    return redirect()->back()->with(['success' => 'تم  الاضافة بنجاح']);

            }
        }
        catch(\Exception $ex)
        {
            
            DB::rollback();
            return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    } #-- end store


    public function edit($id)
    {
         $service =  Service::with('Type_services')->findorFail($id);
       
         return view('admin.services.edit',compact('service'));
    } #-- end edit

    public function editUpdate(Request $re , $id)
    {
        $rules = [
        
           
            'type_service' => 'required|array|min:1|max:10',
            'type_service.*' => 'required|string|min:3|max:120',
            'name' => 'required|string|min:3|max:120',
        ];

        $message = [
            'required' => 'هذا الحقل مطلوب',
            'name.string' => 'يجب ان يكون نصي',
            'name.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
            'name.max'=> 'يجب ان لا يزيد عن 120 حرفا',

        ];

       
   $date =  $this->validate($re,$rules,$message) ;

   try
   {


    $service =  Service::with('Type_services')->findorFail($id);

          
               $service->update(['name' => $date['name']]);

                 foreach($service->Type_services as $key => $value)
                 {
                     if( $date['type_service'][$key] !=  $value->type_name){
                         $value->type_name = $date['type_service'][$key] ; 
                         $value->save();
                     }
                 }

               
       return redirect()->route('admin.services.index')->with(['success'=> 'تم التحديث بنجاح']);

   }
   catch(\Exception $ex)
   {

    DB::rollback();
    return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

   }

    } #-- end editUpdate

    public function delete($id)
    {
        $service =  Service::findorFail($id);

        if($service->delete())
        return redirect()->back()->with(['success'=> 'تم حذف العنصر بنجاح']);
        else
        return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    } #-- end delete

    public function details($id)
    {

    
        $service =  Service::with('Type_services')->findorFail($id);

       return view('admin.services.details',compact('service'));

    } #-- end details


    public function deleteDetails($typeId )
    {
                    $type_service = TypeService::findorFail($typeId);
                    $type_service->delete();
                    return redirect()->back()->with(['success'=> 'تم حذف العنصر بنجاح']);
    } #-- end deleteDetails

    

}
