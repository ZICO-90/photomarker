<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteService;
class SiteServicestsConstroller extends Controller
{
    public function index()
    {
       
        $site_service = SiteService::get();
        return view('admin.site-services.index',compact('site_service'));
    }

    public function create()
    {
        return view('admin.site-services.create');
    }



    public function store(Request $re)
    {
                 $rules = [
                          'title' => 'required|string|min:3|max:120',
                          'body' => 'required|min:5',
                          'body_en' => 'required|min:5',
                         ];
                
                 $message = [
                             'required' => 'هذا الحقل مطلوب',
                             'title.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
                             'title.max' => 'يجب ان لا يزيد عن 120 حرفا',
                             'min' => 'يجب ان يكون خمس احرف علي الاقل',
                             ];

       
                $data =  $this->validate($re,$rules,$message);


             
                try
                {           
                   SiteService::Create(['title' => $data['title'] , 'body' => $data['body']  , 'body_en' =>  $data['body_en']]);
  
                   return  redirect()->route('admin.site.services.index')->with(['success' =>'تم الحفظ بنجاح']); 

                } 
                catch(\Exception $ex)
                {
                 return redirect()->back()->with(['error' =>'حدث خطأ ما برجاء اعادة المحاوله']); 
                }
               
    }

    public function edit($id)
    {
        $site_service = SiteService::findorFail($id);
     
        return view('admin.site-services.edit',compact('site_service'));
    }

    public function update(Request $re , $id)
    {

        $rules = [
                    
            'title' => 'required|string|min:3|max:120',
            'body' => 'required|min:5',
            'body_en' => 'required|min:5',
        ];
       
        $message = [
            'required' => 'هذا الحقل مطلوب',
            'title.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
            'title.max' => 'يجب ان لا يزيد عن 120 حرفا',
            'min' => 'يجب ان يكون خمس احرف علي الاقل',
        ];

        $data =  $this->validate($re,$rules,$message);

        $site = SiteService::findorFail($id);

        $site->title = $data['title'] ;
        $site->body = $data['body'] ;
        $site->body_en = $data['body_en'] ;

        $site->save();

        return  redirect()->route('admin.site.services.index')->with(['success' =>'تم التحديث بنجاح']); 

    }

  

    public function status($id , $bool)
    {
 
        $site = SiteService::findorFail($id);

            if($bool == 1)
            $site-> active = 0 ;
        
            if($bool == 0)
            $site-> active = 1 ;
        
            $site->save();
          
        
        return redirect()->back()->with(['error' =>'تم التفعيل بنجاح']);;

    }

 public function delete($id)
 {
    $SiteService = SiteService::findorFail($id);
    $SiteService->delete();
    return redirect()->back()->with(['success' =>'تم الحذف بنجاح']);;
 } 

}
