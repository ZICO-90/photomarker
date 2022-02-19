<footer class="navbar-fixed-bottom text-center">
    <div class="container">

        <p>جميع الحقوق محفوظة لمؤسسة صانع الصورة للتجارة  &copy; 2005-2015 </p>

        @foreach($footer_setting as $key => $value)
        <a href="{{$value}}"><i class="fa fa-{{$key}}"></i></a>
        @endforeach

    </div>
</footer>