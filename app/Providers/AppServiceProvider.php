<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // regex:/^http:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$
        view()->composer('users.includes.navbar', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });

        
        view()->composer('admin.site-settings.create', function ($view) {
          
            $view->with('social_media', config('app.social_media'));
        });
        
        $social_media = \App\Models\SiteSetting::where('active' ,1)->first();
      
        view()->composer('users.includes.footer', function ($view) use($social_media) {
          
          
            $view->with('footer_setting', $social_media->social_media );
        });
      
        view()->composer('users.about-me.about', function ($view) use($social_media) {
          
            $view->with('about_setting', $social_media );
        });
       
        view()->composer('users.contact.index', function ($view) use($social_media) {
          
            $view->with('index_setting', $social_media );
        });




        # sliders 

        $Sliders = \App\Models\Slider::where('active' ,1)->get();
        
        view()->composer('users.layouts.layout', function ($view) use($Sliders) {
          
            $view->with('Sliders', $Sliders);
        });
    }
}
