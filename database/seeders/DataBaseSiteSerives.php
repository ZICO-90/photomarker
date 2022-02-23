<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\File;
use Illuminate\Http\File ;
use App\Models\SiteSetting;
class DataBaseSiteSerives extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function title()
    {
        return "<p>رواد في الابداع الفني الرقمي لصنع الصورة الاحترافية.</p>
            <p>نعمل في صانع الصورة بفرق متخصصة ونسخر كافة الوسائل التقنية الحديثة لتعزيز مكانة عملائنا.</p>
            <p>الإبداع مزيج بين المنطق والخيال ... هكذا نحن </p>";
    }
    public function file()
    {
        //images/site-setting/ujQcKY1z27J0CzFYiUIO3mG8jhw8DHCuW8TbjvMT.pdf
        
        // php artisan db:seed --class=DataBaseSiteSerives
        $path =  public_path('Files') ;
        $File =  \Illuminate\Support\Facades\File::Files($path)[0];
        $file_path = Storage::disk('public')->putFile('images/site-setting',new File($File));
        return  $file_path;
    }

    public function socialMedia()
    {
        $social_media = [
            'facebook' => 'https://www.facebook.com/2ahmed.medo',
            'twitter' => 'https://twitter.com/?lang=en',
            'youtube' => 'https://www.youtube.com/watch?v=-kC9ZRTR6D4',
            'vimeo' => 'https://vimeo.com/features/livestreaming',
            'instagram' => 'https://www.instagram.com/2ahmed.medo',
            'pinterest' => 'https://www.pinterest.com/aryhewa23/_saved',
            'behance' => 'https://www.behance.net/search/prototypes',
      
        ];

          return $social_media ;
    }

    public function run()
    {
        SiteSetting::create([ 'title' => $this->title() ,
        'email' => 'ahmedkamel@gmail.com' ,
        'phone' => '01024967006' ,
        'active' => '1' ,
        'url_pdf' => $this->file() ,
        'social_media' => $this->socialMedia(),]);
       
    }
}
