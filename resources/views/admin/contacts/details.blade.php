
@extends('admin.layouts-index')


@section('contents')
<div class="box">
<div class="container bootstrap snippets bootdey">
  <div class="panel-body inf-content">
      <div class="row">
          <div class="col-md-4">
              <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="{{asset('storage/'.$Contacts-> file_url)}}" data-original-title="Usuario">
             
          </div>
          <div class="col-md-6">
              <strong>معلومات العميل</strong><br>
              <div class="table-responsive">
              <table class="table table-user-information">
                  <tbody>
  
                      <tr>
                          <td>
                              <strong>
                                  
                                  الاسم / الشركة
                              </strong>
                          </td>
                          <td class="text-primary">
  
                                  <li> {{$Contacts-> company_nam	}}</li>
  
  
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <strong>
                                 
                                 البريد الالكتروني
                              </strong>
                          </td>
                          <td class="text-primary">
                          <li> {{$Contacts-> email}}</li>
                          </td>
                      </tr>
  
                      <tr>
                          <td>
                              <strong>
                                
                                  التليفون
                              </strong>
                          </td>
                          <td class="text-primary">
                          <li> {{$Contacts-> number_call}}</li>
                          </td>
                      </tr>
  
  
                      <tr>
                          <td>
                              <strong>
                                 
                                  نوع النشاط
                              </strong>
                          </td>
                          <td class="text-primary">
                          <li> {{$Contacts-> activity_type}}</li>
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <strong>
                                 
                                  التاريخ
                              </strong>
                          </td>
                          <td class="text-primary">
                          <li> {{$Contacts-> created_at}}</li>
                          </td>
                      </tr>
                 
                  </tbody>
              </table>
              </div>
          </div>
      </div>
  </div>
  </div>
</div>


<!----------------------->

<div class="box">
  <div class="box-header">
    <h3 class="box-title">البيانات </h3>
    <div class="box-tools">
   
    </div>
  </div><!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody>
             <tr>
                   <th>الاسم</th>
                   <th>التاريخ</th>
                   <th>الوقت</th>
             </tr>
              @foreach ($Contacts->contact_orders as $item)
              <tr>
                <td>{{$item->TypeService->type_name}}</td>
                <td>{{$item->TypeService->created_at->isoFormat('YYYY-MM-DD')}}</td>
                <td>{{$item->TypeService->created_at->isoFormat('h:m')}}</td>
                      
              </tr>
              @endforeach
        
        <tbody>
      <table>
  </div> <!-- /.box-body -->

<!--*********************************************************************-->
  <div class="box-header">
    <h3 class="box-title">الصور</h3>
    <div class="box-tools">
   
    </div>
  </div><!-- /.box-header -->
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <tbody>
           <tr>
                 <th>الاسم</th>
                 <th>التاريخ</th>
                 <th>الوقت</th>
               
           
           </tr>
            @foreach ($Contacts->contact_orders as $item)
            @if($item->ServicePhoto != null)
            <tr>
              <td>{{$item->ServicePhoto->type_photo}}</td>
              <td>{{$item->ServicePhoto->created_at->isoFormat('YYYY-MM-DD')}}</td>
              <td>{{$item->ServicePhoto->created_at->isoFormat('h:m')}}</td>
                    
            </tr>
            @endif
            @endforeach
      
      <tbody>
    <table>
</div> <!-- /.box-body -->
</div>

 @endsection