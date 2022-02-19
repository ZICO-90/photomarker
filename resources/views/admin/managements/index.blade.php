
@extends('admin.layouts-index')


@section('contents')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">عرض الادارة</h3>
    @include('admin.includse.alerts.success')
    @include('admin.includse.alerts.errors')
    <div class="box-tools">
   
    </div>
  </div><!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody>
        <tr>
        <th>الاسم</th>
        <th>البريد الالكتروني</th>
        <th> الوظيفه</th>
        <th>العمليات</th>
      
      </tr>
    

      @foreach ($admins as $item)
          
      
      <tr>
        <td>{{$item->name	}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->console	}} </td>
        
         
        <td>
          <a href="{{route('admin.managements.edit',$item->id)}}">تعديل</a> |
          <a href="{{route('admin.managements.delete',$item->id)}}">حذف</a> 
        </td>
        
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

 @endsection