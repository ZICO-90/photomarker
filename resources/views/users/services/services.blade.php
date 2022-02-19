
@extends('users.layouts.layout')

@section('contents')
<div class="main-content">
    <div class="container">
        <h1 class="main-heading">خدماتنا</h1>

        @isset($site_service)
            @foreach($site_service as $item)
                <div class="border-bottom">
                    <h1><strong> {{$item->title}}</strong></h1>
    
                    {!! $item->body !!}
                   
                </div>
    
            @endforeach
            
        @endisset

    </div>
</div>

@endsection