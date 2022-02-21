
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
      
        <th>البريد الالكتروني</th>
      
        <th>العمليات</th>
      
      </tr>
      @foreach ($Subscribe as  $item)
          
      
      <tr>
        <td>{{$item->email}}</td>
        <td>
          <a href="{{route('admin.Subscribes.delete',$item->id)}}">حذف</a> 
        </td>
        
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

 @endsection