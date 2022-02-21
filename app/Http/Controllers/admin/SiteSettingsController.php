<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
use File;
class SiteSettingsController extends Controller
{
    public function index()
    {
       $site_setting =  SiteSetting::get();
       return view('admin.site-settings.index',compact('site_setting'));
    } #-- end index

    public function create()
    {
        return view('admin.site-settings.create');
    } #-- end create


    public function store(Request $re)
    {
        $Rulse = [
                  'title'=>'required|string|min:3',
                  'phone'=>'required|regex:/(01)[0-9]{9}/',
                  'email'=>'required|email',
                  'file'=>'required|mimes:pdf',
                ];

        foreach(config('app.social_media') as $media)
        {
            $Rulse['site.'.$media] = ['required' ,config('app.regex_social_media.'.$media)];
        }
     
        
        $data = $this->validate($re , $Rulse) ;
       
        dd($data );
        $file_path = Storage::disk('public')->putFile('images/site-setting',$data['file']);

   $insert =  SiteSetting::create([
                                   'title' => $data['title'] ,
                                   'email' => $data['email'] ,
                                   'phone' => $data['phone'] ,
                                   'url_pdf' =>  $file_path ,
                                   'social_media' => $data['site'] 
                                 ]);
    return redirect()->route('admin.site.settings.index')->with(['success' => 'تم الاضافة بنجاح']) ;

    } #-- end store


    public function status($id , $bool)
    {
        if($bool != 1)
        {

            $Site = SiteSetting::get();
            for($i=0 ; $i < count($Site) ;$i++ )
            {

                if($Site[$i]->id == $id)
                {
                    $Site[$i]-> active = 1;
                    $Site[$i]->save();
                }elseif($Site[$i]->id != $id)
                {
                    $Site[$i]-> active = 0;
                    $Site[$i]->save();
                }  
            }
             return redirect()->back()->with(['success' =>'تم التفعيل بنجاح']);;
        }
        return redirect()->back()->with(['error' =>'مفعل بالفعل']); 

    } #-- end status

    public function edit($id)
    {
        $site_setting = SiteSetting::findorFail($id);
        return view('admin.site-settings.edit' ,compact('site_setting')) ;
    }

    public function update(Request $request ,$id)
    {



        $Rulse = [
            'title'=>'required|string|min:3',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'email'=>'required|email',
            'file'=> ['mimes:pdf'],
          ];

         
          $site_setting = SiteSetting::findorFail($id);

              foreach( $site_setting->social_media  as $key => $media)
              {
                  $Rulse['site.'.$key] = ['required' ,config('app.regex_social_media.'.$key)];
              }
  
          $data = $this->validate($request,$Rulse) ;

             if( isset($data['file']) )
             {
               Storage::disk('public')->delete($site_setting->url_pdf);
               $file_path = Storage::disk('public')->putFile('images/site-setting',$data['file']);
               $site_setting->url_pdf = $file_path;
             }

            
          $site_setting->update([
                                'title' => $data['title'] ,
                                'email' => $data['email'] ,
                                'phone' => $data['phone'] ,
                                'social_media' => $data['site'] 
                              ]);

          return redirect()->route('admin.site.settings.index')->with(['success' => 'تم التحديث بنجاح']) ;


    }#-- end update

    public function delete($id)
    {
        $site_setting = SiteSetting::findorFail($id);
        Storage::disk('public')->delete($site_setting->url_pdf);
        $site_setting->delete();

        return redirect()->route('admin.site.settings.index')->with(['success' => 'تم الحذف بنجاح']) ;

    }#-- end delete


}
