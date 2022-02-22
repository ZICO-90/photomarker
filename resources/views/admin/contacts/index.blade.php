
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
      <tbody>
       <tr>
          <th>الاسم</th>
          <th>نوع النشاط</th>
          <th>التليفون</th>
          <th>الايميل</th>
          <th>طلبات العميل</th>
          <th>العمليات</th>
      </tr>
      @foreach ($Contacts as  $item)
      <tr>
            <td>{{$item->company_nam	}}</td>
            <td>{{$item->activity_type}}</td>
            <td>{{$item->number_call}}</td>
            <td>{{$item->email}}</td>
            <td>
              @if(!empty($item->servieces))
                  @for($index = 0 ; $index < count($item->servieces) ;  $index++)
                      <li>{{$item->servieces[$index]}}</li>
                  @endfor
              @endif        
            </td>              
            <td>
              <a href="{{route('admin.contacts.details',$item->id)}}">عرض</a> |
              <a href="{{route('admin.contacts.delete',$item->id)}}">حذف</a> 
            </td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

 @endsection