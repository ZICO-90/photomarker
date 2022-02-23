<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Custmore;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CustmoresController extends Controller
{
    public function index()
    {
        $Custmores = Custmore::get();
        return view('admin.Custmores.index',compact('Custmores'));


    }

    public function create()
    {
        return view('admin.Custmores.create');
    }

    public function store(Request $re)
    {
        $rules = [
            'title.*' => 'required|string|min:3|max:120',
            'files' => 'required|array',
            'files.*' => 'required|file',
        ];
       
        $message = [
            'required' => 'هذا الحقل مطلوب',
            'title.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
            'title.max' => 'يجب ان لا يزيد عن 120 حرفا',
        ];

       $data =  $this->validate($re,$rules,$message);
       
       $Values_Array = [];
      
   if(count($data['title']) ==  count($data['files']) )
    {
        for($index = 0 ; $index < count($data['title']) ; $index++ )
        {
            $file_path = Storage::disk('public')->putFile('images/cstmores',$data['files'][$index]);
 
            array_push( $Values_Array , ['title' => $data['title'][$index]  ,'url' => $file_path , 'created_at' => Carbon::now() , 'updated_at' => Carbon::now()]);
        }
    }else
    {
        if(count($data['title'])  >  count($data['files'])) 
        {
            return redirect()->back()->with(['error' => 'من فضل ادخل الملف ']) ;
        }
    }
      

      


            try{

              Custmore::insert($Values_Array);

              return redirect()->route('admin.custmores.index')->with(['success' => 'تم الاضافة  بنجاح ']);
        

            }catch(\Exception $ex)
            {

                foreach($Values_Array as  $value)
                {
                 Storage::disk('public')->delete($value['url']) ;
                 
                }
           
                return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء اعاده المحاوله في وقت ااخر']) ;
            }

        
    }


    public function edit($id)
    {
     
        $Custmore = Custmore::findorFail($id);

        return view('admin.Custmores.edit',compact('Custmore'));
    }

    public function update(Request $re , $id)
    {

      

        $rules = [
            'title' => 'required|string|min:3|max:120',
            
        ];
       
        $message = [
            'required' => 'هذا الحقل مطلوب',
            'title.min' => 'يجب ان يكون ثلاث احرف علي الاقل',
            'title.max' => 'يجب ان لا يزيد عن 120 حرفا',
        ];

       $data =  $this->validate($re,$rules,$message);

     
     

 $Custmore = Custmore::find($id);

if($Custmore != null)
{
    if($re->file != null)
    {
       
        $file_path = Storage::disk('public')->putFile('images/cstmores' ,$re->file);
        Storage::disk('public')->delete( $Custmore->url) ;
        $Custmore->url = $file_path ;
    }

    $Custmore ->title = $data['title'] ;
    $Custmore->save();

    return redirect()->route('admin.custmores.index')->with(['success' => 'تم التعديل بنجاح']);

}
       
        
return redirect()->route('admin.custmores.index')->with(['error' => 'حدث خطأ ما برجاء اعاده المحاوله في وقت ااخر']) ;
     

     

    }
  


    public function status($id , $bool)
    {

        $status = Custmore::findorFail($id);

                 if($bool == 1)
                 {
                     $status ->active = 0 ;
                 }
                 
                 if($bool == 0)
                 {
                     $status ->active = 1;
                 }
                 
                 $status->save();
                 
      return redirect()->back()->with(['error' =>'تم التفعيل بنجاح']);;

    }

    public function delete($id)
    {
        $delete = Custmore::find($id);
        if($delete != null)
        {
            Storage::disk('public')->delete( $delete->url) ;
            $delete->delete();

            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

        }

        return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء اعاده المحاوله في وقت ااخر']) ;

    }
    
}
