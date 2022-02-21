<footer class="navbar-fixed-bottom text-center">
    <div class="container">
@php
        $social_media = \App\Models\SiteSetting::where('active' ,1)->first();
@endphp
        <p>جميع الحقوق محفوظة لمؤسسة صانع الصورة للتجارة  &copy; 2005-2015 </p>
@isset($social_media)
        @foreach($social_media->social_media as $key => $value)
        <a href="{{$value}}"><i class="fa fa-{{$key}}"></i></a>
        @endforeach
@endisset
    </div>
</footer>