
@extends('admin.layouts-index')


@section('js')

@include('admin.includse.js-create-element')

@endsection

@section('contents')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">نوع خدمات البيانا - {{$service->name}}</h3>
    @include('admin.includse.alerts.success')
    @include('admin.includse.alerts.errors')
    <div class="box-tools">
   
    </div>
  </div><!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody><tr>
        <th>اسم الخدمه</th>
        <th>التاريخ</th>
        <th>الوقت</th>
      
        <th>العمليات</th>
      
      </tr>
      @foreach ($service->Type_services as $item)
          
      
      <tr>
        <td>{{$item->type_name}}</td>
        <td>{{$item->created_at->isoFormat('YYYY-MM-DD')}}</td>
        <td>{{$item->created_at->isoFormat('H:m')}}</td>
        <td>
            <a href="{{route('admin.services.delete.details',['typeId' => $item->id , 'photoId' => 0] )}}">حذف</a>
        </td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div>
  <!-- /.box-body -->


  <div class="box-header">
    <h3 class="box-title">نوع خدمات الصور - {{$service->name}}</h3>
    <div class="box-tools">
   
    </div>
  </div><!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody><tr>
        <th>اسم الخدمه</th>
        <th>التاريخ</th>
        <th>الوقت</th>
      
        <th>العمليات</th>
      
      </tr>
      @foreach ($service->Service_Photoes as $item)
          
      <tr>
        <td>{{$item->type_photo}}</td>
        <td>{{$item->created_at->isoFormat('YYYY-MM-DD')}}</td>
        <td>{{$item->created_at->isoFormat('H:m')}}</td>
        <td>
          <a href="{{route('admin.services.delete.details', ['typeId' => 0 ,'photoId' => $item->id] )}}">حذف</a>
        </td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div>
  <!-- /.box-body -->
</div>



<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">اضافة المزيد  الي الخدمه  التالية</h3>
      
    </div><!-- /.box-header -->
    <!-- form start -->
    <form action="{{route('admin.services.store',$service->id)}}" method="POST">
      @csrf
      <div class="box-body">
        <div class="form-group">
        
          <input style="color: red" type="text" class="form-control" name="name" readonly  value="{{$service->name}}" placeholder="ادخل اسم الخدمه">
     
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">نوع البيانات *</h3>
            </div>

            <div class="box-body box-body-two">
              <input class="form-control input-lg" type="text"  name="type_service[]" placeholder="داخل نوع البيانات">
              @error('type_service.*')
              <span class="text-danger">{{$message}}</span>
              @enderror
              @error('type_service')
              <span class="text-danger">{{$message}}</span>
              @enderror
              <br>
              <button class="add_field_button_two">انشاء عنصر</button>
              
            </div>
          </div>



          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">نوع البيانات الصور</h3>
            </div>

            <div class="box-body box-body-One">
              <input class="form-control input-lg" type="text"  name="photo_service[]" placeholder="داخل نوع البيانات">
              @error('photo_service.*')
              <span class="text-danger">{{$message}}</span>
              @enderror
              @error('photo_service')
              <span class="text-danger">{{$message}}</span>
              @enderror
              <br>
              <button class="add_field_button">انشاء عنصر</button>
              
            </div>
          </div>

          
        </div>
      </div><!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">اضافة انواع بيانات اخري</button>
      </div>
    </form>
  </div>

 @endsection