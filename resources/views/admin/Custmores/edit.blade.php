@extends('admin.layouts-index')



@section('contents')

<div class="box box-primary">
    <div class="box-header with-border">
      @include('admin.includse.alerts.errors')
    </div><!-- /.box-header -->
    <!-- form start -->
    <form action="{{route('admin.custmores.update' , $Custmore->id )}}" method="POST" enctype="multipart/form-data">
      {{method_field('put')}}
      @csrf
      <div class="box-body">
        <div class="form-group">
          <div class="box box-success">
            <div class="box-header with-border">

              <input type="text"  name="title"  value="{{$Custmore->title}}" >
              @error('title')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="box-header with-border">

              <img src="{{asset('storage/'.$Custmore->url)}}" alt="img">
            </div>

            <div class="box-body box-body-One">
              <input type="file"  name="file" >
              @error('file')
              <span class="text-danger">{{$message}}</span>
              @enderror
              <br>
          
              
            </div>
          </div>

          
        </div>
      </div><!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">تحديث </button>
      </div>
    </form>
  </div>
@endsection