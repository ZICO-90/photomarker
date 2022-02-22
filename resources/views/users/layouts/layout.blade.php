<!DOCTYPE html>
<html {{App::getLocale() == 'ar'? 'ar' : 'en'}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title>Photo Maker</title>
    @include('users.includes.css')
    @yield('css')

</head>

<body>

<!--===============================
    NAV
===================================-->
    @include('users.includes.navbar')

<!--===============================
    in here tags
===================================-->
    @if(url()->current() != url('/'))
    <div class="fixed-bg">
        <img src="/users/images/1.jpg">
    </div>
    @endif



<!--===============================
    in here tags
===================================-->
@if(url()->current() == url('/'))

      <div id="owl-demo" class="owl-carousel owl-theme">
              @php
                       $Sliders = \App\Models\Slider::where('active' ,1)->get();
              @endphp
      
          @isset($Sliders)
              @foreach($Sliders as $item)
              <div class="item"><img src="{{asset('storage/'.$item->url_img )}}" alt="..."></div>
              @endforeach
          @endisset)
      </div>
      
      <div class="hidden">
          <a class="btn owl-btn next"><span class="fa fa-angle-right"></span></a>
          <a class="btn owl-btn prev"><span class="fa fa-angle-left"></span></a>
      </div>


@endif


<!--===============================
   extents pages
===================================-->
@yield('contents')


<!--===============================
    FOOTER
===================================-->
@include('users.includes.footer');


<!--===============================
    SCRIPT
===================================-->
@include('users.includes.js');


<!--===============================
   extents SCRIPT
===================================-->
@yield('js')
</body>
</html>