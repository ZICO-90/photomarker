@extends('users.layouts.layout')

@section('contents')
<div class="main-content">
    <div class="container">
        <h1 class="main-heading">من نحن</h1>
        @isset($about_setting)   
        <div class="text-center div-padding">
            {!! $about_setting->title !!}
        

            <a href="{{asset('storage/'.$about_setting->url_pdf)}}" target="_blank" class="btn btn-white margin"><span>تحميل بروفايل الشركة</span></a>
            <a href="{{route('users.gallery.index')}}" class="btn btn-white margin"><span>عرض اعمالنا</span></a>
        </div>
        @endisset
        @isset($Custmore)           
        <div class="div-small-padding">
            <h1 class="main-heading">عملائنا</h1>

            <div class="row">

            
                    
              
                <div class="col-xs-2 col-sm-1 no-padding text-center">
                    <a class="owl-btn prev-pro margin"><span class="fa fa-angle-right"></span></a>
                </div>
           
                <div class="col-xs-8 col-sm-10 no-padding">
                    <div id="owl-demo-products" class="owl-carousel-clients">

                        @foreach ($Custmore as $item)

                            <div class="item">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="{{asset('storage/'.$item->url)}}">
                                    <img src="{{asset('storage/'.$item->url)}}" alt="img">
                                </a>
                            </div>

                        @endforeach
                       
                    </div>

                </div>

                <div class="col-xs-2 col-sm-1 no-padding text-center">
                    <a class="owl-btn next-pro margin"><span class="fa fa-angle-left"></span></a>
                </div>

            </div>
        </div>

        @endisset
    </div>
</div>

@endsection

