<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AboutsController extends Controller
{
    public function index()
    {
        $abouts = About::get();
        return view('admin.abouts.index',compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }



    public function store(Request $re)
    {
                 $rules = [
                    
                     'title' => 'required|string|min:3|max:120',
                     'body' => 'required',
                     'file' => 'required|mimes:pdf',
                 ];
                
                 $message = [
                     'required' => 'هذا الحقل مطلوب',
                     'title.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
                     'title.max' => 'يجب ان لا يزيد عن 120 حرفا',
                     'file.mimes'=> 'يجب ان يكون ملف من نوع pdf'
                    
                 ];

       
                $data =  $this->validate($re,$rules,$message);


                $file_path = null;
                try
                {
                 $file_path = Storage::disk('public')->putFile('images/about',$data['file']);

                 About::Create(['title' => $data['title'] , 'body' => $data['body']  , 'url' => $file_path ]);

                
               return  redirect()->route('admin.abouts.index')->with(['success' =>'تم الحفظ بنجاح']); 

                } catch(\Exception $ex){
                   
                 Storage::disk('public')->delete($file_path);
                 return redirect()->back()->with(['error' =>'حدث خطأ ما برجاء اعادة المحاوله']); 
                }
               
    }

    public function edit($id)
    {
        $Abouts = About::findorFail($id);
     
        return view('admin.abouts.edit',compact('Abouts'));
    }

    public function update(Request $re , $id)
    {

        $rules = [
                    
            'title' => 'required|string|min:3|max:120',
            'body' => 'required',
            'file' => 'nullable|mimes:pdf',
        ];
       
        $message = [
            'required' => 'هذا الحقل مطلوب',
            'title.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
            'title.max' => 'يجب ان لا يزيد عن 120 حرفا',
            'file.mimes'=> 'يجب ان يكون ملف من نوع pdf'
           
        ];

        $data =  $this->validate($re,$rules,$message);

        $Abouts = About::findorFail($id);


        if(isset($data['file'] ))
        {
            $file_path = Storage::disk('public')->putFile('images/about',$data['file']);
            Storage::disk('public')->delete($Abouts->url);
            $Abouts->url =  $file_path ;
        }

        $Abouts->title = $data['title'] ;
        $Abouts->body = $data['body'] ;

        $Abouts->save();

        return  redirect()->route('admin.abouts.index')->with(['success' =>'تم التحديث بنجاح']); 

    }

  

    public function status($id , $bool)
    {
        if($bool != 1){

            $Abouts = About::get();
            for($i=0 ; $i < count($Abouts) ;$i++ ){

                if($Abouts[$i]->id == $id){

                    $Abouts[$i]-> active = 1;
                    $Abouts[$i]->save();
                }elseif($Abouts[$i]->id != $id){

                    $Abouts[$i]-> active = 0;
                    $Abouts[$i]->save();
                }  
            }


             return redirect()->back()->with(['error' =>'تم التفعيل بنجاح']);;
        }
        

       
        return redirect()->back()->with(['error' =>'مفعل بالفعل']); 

    }

 public function delete($id)
 {
  
    $Abouts = About::findorFail($id);
    Storage::disk('public')->delete($Abouts->url);
    $Abouts->delete();
    return redirect()->back()->with(['success' =>'تم الحذف بنجاح']);;


 } 



}






