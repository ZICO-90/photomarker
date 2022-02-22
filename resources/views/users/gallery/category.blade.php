
@extends('users.layouts.layout')


@section('css')

<link rel="stylesheet" type="text/css" href="/users/image-popup/source/jquery.fancybox.css?v=2.1.5" media="screen">
<link rel="stylesheet" type="text/css" href="/users/image-popup/source/helpers/jquery.fancybox-buttons.css?v=1.0.5">
@endsection

@section('contents')

<div class="main-content">
    <div class="container-fluid">
        <h1 class="main-heading">gallery</h1>
        <h1 class="main-heading">{{$gallery->title}}</h1>

        <div class="row">
            @isset($gallery->photos)
                  @foreach($gallery->photos as $item)
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                      <a class="fancybox-buttons img-holder small-img" rel="gallery" title="" data-fancybox-group="button" href="{{asset('storage/'.$item->url)}}">
                          <img src="{{asset('storage/'.$item->url)}}" alt="img">
                      </a>
                  </div>
                  @endforeach
            @endisset
                   
        </div>

    </div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="/users/image-popup/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="/users/image-popup/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script>
    $(document).ready(function (){
        $('.fancybox-buttons').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',

            prevEffect : 'none',
            nextEffect : 'none',

            closeBtn  : false,

            helpers : {
                title : {
                    type : 'inside'
                },
                buttons	: {}
            },

            afterLoad : function() {
                this.title = '<a href="#" class="btn btn-fb btn-small"><i class="fa fa-facebook right-fa"></i> Share</a>' +
                        '<a href="#" class="btn btn-tw btn-small"><i class="fa fa-twitter right-fa"></i> Share</a>' +
                        '<a href="#" class="btn btn-inst btn-small"><i class="fa fa-instagram right-fa"></i> Share</a>';
            }
        });


    });
</script>

@endsection

