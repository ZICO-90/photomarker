@extends('admin.layouts-index')


@section('contents')

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">الخدمات</h3>
      @include('admin.includse.alerts.errors')
    </div><!-- /.box-header -->
    <!-- form start -->
    <form action="{{route('admin.services.update',$service ->id)}}" method="POST">
        {{method_field('put')}}
      @csrf
      <div class="box-body">
        <div class="form-group">
         
          <input type="text" class="form-control" name="name" value="{{$service ->name}}" placeholder="ادخل اسم الخدمه">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div><!-- /.box-body -->

      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">نوع البيانات </h3>
        </div>

        <div class="box-body">
          @foreach($service->Type_services as $item)
          <input class="form-control input-lg" type="hidden"  value="{{$item->id}}" name="type_service_ids[]">
          <input class="form-control input-lg" type="text"  value="{{$item->type_name}}" name="type_service[]" placeholder="داخل نوع البيانات">
          <br>
          @endforeach
          
        </div>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">حديث </button>
      </div>
    </form>
  </div>
@endsection