<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
class SlidersController extends Controller
{
    public function index()
    {
        $Sliders =  Slider::get();
        return view('admin.sliders.index',compact('Sliders'));
    }
    public function create()
    {
        
        return view('admin.sliders.create');
    }

    public function store(Request $re)
    {
        $rules = [
           
            'file' => 'required',
        ];
       
        $message = [
            'required' => 'هذا الحقل مطلوب',
          
        ];

        $data =  $this->validate($re,$rules,$message);

        $file_path = Storage::disk('public')->putFile('images/sliders',$data['file']);

        try
        {
            Slider::create(['url_img' => $file_path ]) ;

            return redirect()->route('admin.sliders.index')->with(['success' => 'تم الاضافة بنجاح']);

        }catch(\Exception $ex){

               DB::rollback();
               Storage::disk('public')->delete($file_path) ;
               return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء إعاده المحاولة فيما بعد']);

        }
        
    }


    public function update(Request $re , $id)
    {

        $Rulse = [
            'file_'.$id =>'required',
           
        ];
       
        $message = [
         'required' => 'هذا الحقل مطلوب',

        ];

      $data = $this->validate($re , $Rulse  , $message) ;

                $update =    Slider::findorFail($id);
                Storage::disk('public')->delete($update->url);
                $file_path = Storage::disk('public')->putFile('images/sliders',$data['file_'.$id]);
        
                $update->url_img = $file_path ;
                $update->save();
                return redirect()->back()->with(['error' =>'تم التحديث بنجاح']);;
    }

    public function status($id , $bool)
    {

        $status = Slider::findorFail($id);

                 if($bool == 1)
                     $status ->active = 0 ;
                 
                 
                 if($bool == 0)
                     $status ->active = 1;
                 
                 $status->save();
                 
      return redirect()->back()->with(['error' =>'تم التفعيل بنجاح']);;

    }


    public function delete($id)
    {
            $delete =  Slider::findorFail($id);
     
            Storage::disk('public')->delete( $delete->url_img) ;
            $delete->delete();

            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }
}
