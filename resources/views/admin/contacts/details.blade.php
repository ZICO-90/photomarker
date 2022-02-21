
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

                      <tr>
                        <td>
                            <strong>
                               
                               طلبات العميل
                            </strong>
                        </td>
                        <td class="text-primary">
                            @if(!empty($Contacts->servieces))
        
                            @for($index = 0 ; $index < count($Contacts->servieces) ;  $index++)
                            <li>{{$Contacts->servieces[$index]}}</li>
                  
                            @endfor
                  
                            @endif
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


 @endsection