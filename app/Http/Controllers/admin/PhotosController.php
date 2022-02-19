<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParentPhoto;
use App\Models\ChildPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class PhotosController extends Controller
{
   
    public function index()
    {
        $photos = ParentPhoto::get();
     
        return view('admin.Photos.index',compact('photos'));
    }

    public function create()
    {
        return view('admin.Photos.create');
    }

    public function store(Request $re)
    {

        $Rulse = [
            'title' =>'required',
            'file' =>'required',
            'files' =>'required',
        ];

        $message = [
         'required' => 'هذا الحقل مطلوب',

        ];

    $data = $this->validate($re , $Rulse  , $message) ;

        $master_photo = [] ; 
        $Files_array = [] ; 
   
        for($index = 0 ; $index  <  count($data['files']) ; $index++)
        {
            $file_path = Storage::disk('public')->putFile('images/Photos',$data['files'][$index]);

            if(empty($master_photo)){
                $path = Storage::disk('public')->putFile('images/photo-master',$data['file']);
                array_push($master_photo, ['url' =>  $path  , 'title' => $data['title']]) ;
            }
          
            array_push($Files_array, ['url' =>  $file_path ]) ;
        }

    try
    {
        DB::beginTransaction();
              $master_insert = ParentPhoto::create($master_photo[0]);
              $master_insert->photos()->createMany($Files_array);
        DB::commit();

        return redirect()->route('admin.photos.index')->with(['success' => 'تم الاضافة بنجاح']);

    }
    catch(\Exception $ex)
    {
        DB::rollback();

        foreach($Files_array as $index => $value)
        {
            Storage::disk('public')->delete($value) ;
        }

        Storage::disk('public')->delete($master_photo[0]['url']) ;
        return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء إعاده المحاولة فيما بعد']);

    }

    }

    public function details($id)
    {
        $photos  = ParentPhoto::with('photos')->findorFail($id);
        return view('admin.Photos.details',compact('photos'));
    }

    public function editMaster($id)
    {
        

        $photos = ParentPhoto::findorFail($id);
   
        return view('admin.Photos.edit-master',compact('photos'));
    }


    public function MasterUpdate(Request $re , $id)
    {

      
        $Rulse = [
            'file'=>'sometimes|nullable',
            'title'=>'required',
           
        ];
       
        $message = [
         'required' => 'هذا الحقل مطلوب',

        ];

        $data = $this->validate($re , $Rulse  , $message);


        try
        {
            $update =    ParentPhoto::findorFail($id);
            if( $update == null)
            return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء إعاده المحاولة فيما بعد']);

             $file_path = null ;
            if($re->file != null)
            {
                Storage::disk('public')->delete($update->url);
                $file_path = Storage::disk('public')->putFile('images/photo-master',$data['file']);
                $update->url = $file_path ;
            }
           

           
            $update->title = $data['title'] ;
            $update->save();
            return redirect()->route('admin.photos.index');


        }catch(\Exception $ex){
            dd($ex) ;
              DB::rollback();
              if(!empty($file_path))
              {
                Storage::disk('public')->delete($file_path);
              }
              
            return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء إعاده المحاولة فيما بعد']);

        }
     

    }

    public function ChidUpdate(Request $re , $id)
    {
       

        $Rulse = [
            'file_'.$id =>'required',
           
        ];
       
        $message = [
         'required' => 'هذا الحقل مطلوب',

        ];

    $data = $this->validate($re , $Rulse  , $message) ;



    try
    {
        $update =    ChildPhoto::findorFail($id);
        Storage::disk('public')->delete($update->url);
        $file_path = Storage::disk('public')->putFile('images/Photos',$data['file_'.$id]);

        $update->url = $file_path ;
        $update->save();
    
        

         return redirect()->back()->with(['success' => 'تم  التعديل بنجاح']);


    }catch(\Exception $ex){
          DB::rollback();
          Storage::disk('public')->delete($file_path);
        return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء إعاده المحاولة فيما بعد']);

    }
     

    }

    public function delete($id)
    {
        $Delete = ChildPhoto::findorFail($id);
        if($Delete->delete())
        {
            Storage::disk('public')->delete($Delete->url);
            return redirect()->back()->with(['success'=> 'تم الحذف بنجاح']);
        }

        return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء إعاده المحاولة فيما بعد']);

    }


    public function deleteMaster($id)
    {
        $Delete = ParentPhoto::findorFail($id);
        if($Delete->delete())
        {
            Storage::disk('public')->delete($Delete->url);
            return redirect()->back()->with(['success'=> 'تم الحذف بنجاح']);
        }

        return redirect()->back()->with(['error' => 'حدث خطأ ما برجاء إعاده المحاولة فيما بعد']);

    }
}
