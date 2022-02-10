
@extends('admin.layouts-index')


@section('contents')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">الخدمات</h3>
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
        <th>عدد البيانات</th>
        <th>عدد الصور</th>
        <th>العمليات</th>
      
      </tr>
      @foreach ($service as $item)
          
      
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->created_at->isoFormat('YYYY-MM-DD')}}</td>
       

        <td>
          <li> {{$item->Type_services->count()}}</li>
          <li> <a href="{{route('admin.services.edit',$item->id)}}">عرض </a> </li>
      
        </td>

        <td>
          <li> {{$item->Service_Photoes->count()}}</li>
          <li> <a href="{{route('admin.services.edit',$item->id)}}"> عرض </a> </li>
     
        </td>
        
        <td>
          <a href="{{route('admin.services.edit',$item->id)}}">تعديل</a>
          |
          <a href="{{route('admin.services.delete',$item->id)}}">حذف</a> |
          <a href="{{route('admin.services.details',$item->id)}}">عرض</a>
        </td>
        
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

 @endsection