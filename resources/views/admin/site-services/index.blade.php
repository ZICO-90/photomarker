
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
        <th>العنوان</th>
        
   
        <th> تغير الحالة</th>
        <th>العمليات</th>
      
      </tr>
    

      @foreach ($site_service as $item)
          
      
      <tr>
        <td>{{$item->title	}}</td>
       
        <td>
            <a href="{{ route('admin.site.services.status' , ['id' => $item->id , 'bool' => $item-> active ])}}" 
            class="btn btn-danger">
            @if($item-> active == 1)
            نشط
            @else
            غير نشط
            @endif

            </a>
            </td>
        
         
        <td>
         
          <a href="{{route('admin.site.services.edit',$item->id)}}">تعديل</a> |
          <a href="{{route('admin.site.services.delete',$item->id)}}">حذف</a> 
        </td>
        
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

 @endsection