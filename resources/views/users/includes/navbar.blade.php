<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="fa fa-bars"></span>
                </button>

                <a href="{{route('homePage' , app()->getLocale())}}" class="navbar-brand hidden-sm hidden-md hidden-lg"><img src="images/logo.png" alt="LOGO"></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right text-align-left">
                    <li class="active"><a href="{{route('homePage',app()->getLocale())}}">{{__('contacts/navbar.home')}}</a></li>
                    <li><a href="{{route('users.abouts.index')}}">{{__('contacts/navbar.about_me')}}</a></li>
                    <li><a href="{{route('users.services.index')}}">{{__('contacts/navbar.Services')}}</a></li>
                </ul>

                <a href="{{route('homePage' , app()->getLocale())}}" class="navbar-brand hidden-xs text-center"><img src="/users/images/logo.png" alt="LOGO"></a>

                <ul class="nav navbar-nav navbar-left text-align-right">
                    <li><a href="{{route('users.gallery.index')}}">{{__('contacts/navbar.Photo_gallery')}}</a></li>
                    <li><a href="{{route('users.contact.index')}}">{{__('contacts/navbar.contacts')}}</a></li>
        
                    <li>
                        @foreach($available_locales as $locale_name => $available_locale)
                            @if($available_locale === $current_locale)
         
                            @else
                               
                                   <a href="{{route('language' ,  $available_locale )}}"> {{ $locale_name }}</a>
                                  
            
                            @endif
                        @endforeach
                    
                    </li>
                

                </ul>
            </div>
        </div>
    </div>
</nav>