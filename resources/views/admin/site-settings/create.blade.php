
@extends('admin.layouts-index')
@section('contents')
<div class="box box-primary">
    <form action="{{route('admin.site.settings.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <!-- textarea -->
        <div class="form-group">
            <label>title</label>
            <textarea class="form-control" name="title" rows="3" placeholder="Enter ..."></textarea>
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

         <!-- text input -->
     
         <div class="form-group">
            <label>phone</label>
            <input type="tel" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter ...">
            @error('tel')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label>email</label>
            <input type="email" name="email" value="{{old('email')}}"  class="form-control" placeholder="Enter ...">
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

       

          @foreach($social_media as  $media)
          <div class="form-group">
            <label>{{$media}}</label>
            <input type="text" name="site[{{$media}}]" value="{{old('site.'.$media)}}" class="form-control" placeholder="Enter {{$media}}" >
            @error('site.'.$media)
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