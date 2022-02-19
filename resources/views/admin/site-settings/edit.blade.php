
@extends('admin.layouts-index')
@section('contents')
<div class="box box-primary">
    <form action="{{route('admin.site.settings.update' ,$site_setting->id)}}" method="POST" enctype="multipart/form-data">
      {{method_field('put')}} 
      @csrf
         <!-- textarea -->
        <div class="form-group">
            <label>title</label>
        
            <textarea class="form-control" name="title"  rows="3" placeholder="Enter ...">{{$site_setting->title}}</textarea>
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

         <!-- text input -->
     
         <div class="form-group">
            <label>phone</label>
            <input type="tel" name="phone" value="{{$site_setting->phone}}" class="form-control" placeholder="Enter ...">
            @error('tel')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>email</label>
            <input type="email" name="email" value="{{$site_setting->email}}"  class="form-control" placeholder="Enter ...">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
           
            <input type="file" name="file"  accept="application/pdf" >
            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

       

          @foreach($site_setting->social_media as $key => $value)
          <div class="form-group">
            <label>{{$key}}</label>
            <input type="text" name="site[{{$key}}]" value="{{$value}}" class="form-control" placeholder="Enter {{$key}}" >
            @error('site.'.$key)
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

          @endforeach
          
          
          
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">انشاء خدمه</button>
          </div>
          
         
         
    </form>

 </div>
 @endsection