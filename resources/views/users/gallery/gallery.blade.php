@extends('users.layouts.layout')

@section('contents')

<div class="main-content">
    <div class="container-fluid">
        <h1 class="main-heading">أعمالنا</h1>

        <div class="row">
            @isset($gallery)
                @foreach($gallery as $item)
                   <div class="col-xs-12 col-sm-6 col-md-4 no-padding">
                       <a href="{{route('users.gallery.detalis' ,['id' => $item->id])}}" class="img-holder">
                           <img src="{{asset('storage/'.$item->url)}}" alt="...">
       
                           <div class="hover-content">
                               <h1>{{$item->title}}</h1>
                           </div>
                       </a>
                   </div>
               @endforeach

            @endisset
           
       
        </div>

    </div>
</div>

@endsection