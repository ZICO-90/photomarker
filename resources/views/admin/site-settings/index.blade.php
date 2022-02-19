
@extends('admin.layouts-index')


@section('contents')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">اعدادا ت الموقع</h3>
    @include('admin.includse.alerts.success')
    @include('admin.includse.alerts.errors')
    <div class="box-tools">
   
    </div>
  </div><!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody><tr>
        <th>العنوان</th>
        <th>التليفون</th>
        <th>البريد  الالكتروني</th>
        <th>الملف</th>
        <th>المواقع</th>
        <th> تغير الحالة</th>
        <th>العمليات</th>
      
      </tr>
    
    

      @foreach ($site_setting as $item)
     
      
      <tr>
        <td>{!! substr( $item->title  ,0 , 200) !!} ....</td>
        <td>{{$item->phone	}}</td>
        <td>{{$item->email	}}</td>

        <td> <a href="{{asset('storage/'.$item->url_pdf)}}"> الملف</a> </td>
        <td>


          <div class="btn-group">
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              الموقع
            </button>
            <div class="dropdown-menu">
           
              @foreach ($item->social_media as $key => $value)
              <a class="dropdown-item" href="{{$value}}">{{$key}}</a>
              <br>
              @endforeach
             
           </div>

          </div>

          </td>
       
        <td>
            <a href="{{ route('admin.site.settings.status' , ['id' => $item->id , 'bool' => $item-> active ])}}" 
            class="btn btn-danger">
            @if($item-> active == 1)
            نشط
            @else
            غير نشط
            @endif

            </a>
            </td>
        
         
        <td>
         
          <a href="{{route('admin.site.settings.edit',$item->id)}}">تعديل</a> |
          <a href="{{route('admin.site.settings.delete',$item->id)}}">حذف</a> 
        </td>
        
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

 @endsection