@extends('users.layouts.layout')

@section('css')
<style>
    input[type="file"] {
        padding: 0;
    }

    .black-box.margin-bottom {
        margin: 0 0 15px;
    }

    .checkbox-holder {
        font-weight: 100;
        position: relative;
        cursor: pointer;
        margin-bottom: 10px;
        display: block;
    }

    .checkbox-holder span {
        vertical-align: middle;
    }

    .checkbox-holder .checkbox-icon {
        width: 13px;
        height: 13px;
        line-height: 7px;
        display: inline-block;
        border: 1px solid #000;
        background: #000;
        text-align: center;
        margin: 0 4px;
    }

    .checkbox-holder input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkbox-holder .checkbox-icon:after {
        content: '';
        background: #000;
        width: 7px;
        height: 7px;
        display: block;
        margin: 2px;
    }

    .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon {
        border-color: #00bcd4;
    }

    .checkbox-holder input[type="checkbox"]:checked + .checkbox-icon:after {
        background: #00bcd4;
    }

    .main-label {
        border-bottom: 1px dashed #00bcd4;
    }

    .check-open {
        margin-top: 10px;
    }
</style>
@endsection


@section('js')
<script src="/users/js/jquery-1.11.1.min.js"></script>
<script src="/users/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function (){
        $('.check-open').slideUp(0);

        $('.main-label .checkbox-holder').click(function (){
            if($(this).find('input').is(':checked')) {
                $(this).parents('.main-label').next('.check-open').stop().slideDown();
            } else {
                $(this).parents('.main-label').next('.check-open').stop().slideUp();
            }
        });
    });
</script>



<script >
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('service')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false;
        });
      
       
    }
</script>

<script src="/users/js/script.js"></script>
@endsection


@section('contents')



<div class="main-content">
    <div class="container">
        <h1 class="main-heading">تواصل معنا</h1>



<!------------------------------------------------------>
             @include('users.includes.alerts.success')
             @include('users.includes.alerts.errors')
             <br>
<!------------------------------------------------------>


            <div class="row">
                <div class="col-xs-12 col-sm-8">
                   

                    <form action="{{route('users.contact.store')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <input type="text" name="company_nam" placeholder="الاسم / الشركة">
                    @error('company_nam')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="text" name="activity_type" placeholder="نوع النشاط">
                    @error('activity_type')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="tel" name="number_call" placeholder="رقم التواصل">
                    @error('number_call')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <input type="email" name="email"  placeholder="البريد الإلكتروني">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
    
    
                        <label>نوع الخدمة</label>
    
                        <div class="row">
                            @if(isset($service)) <!--# begin if service---->
                          
                            @foreach($service  as $index => $item)   <!--# begin foreach service---->
                            <div class="col-xs-12 col-sm-6 col-md-4">

                                <div class="box black-box margin-bottom">
                                    <div class="main-label">
                                        <label class="checkbox-holder">
                                            <input type="checkbox"  name="service" value="{{$item->id}}" onclick="onlyOne(this)" >
                                            <span class="checkbox-icon"></span>
                                            <span>{{$item->name}}</span>
                                        </label>
                                    </div>
    
    
                                    <div class="check-open">
                                        @foreach($item->Type_services  as  $item_type) <!--# begin foreach Type_services ---->
                                        <label class="checkbox-holder">
                                            <input type="checkbox"  name="Type_services[]"  value="{{$item_type->type_name}}">
                                            <span class="checkbox-icon"></span>
                                            <span>{{$item_type->type_name}}</span>
                                        </label>
                                        @endforeach <!--# end foreach Type_services ---->
                                       
    
                                        <label class="checkbox-holder">
                                            <input type="checkbox" name="other[{{$index}}]" value="{{$index}}" >
                                            <span class="checkbox-icon"></span>
                                            <span> (يرجى التحديد )أخرى </span>
                                        </label>
    
                                        <input type="text" name="other_value[{{$index}}]" placeholder="">
                                        
                                       
                                  
    
                                    </div>
                                </div>
                            </div>
    
    
                            @endforeach  <!--# end foreach service---->
       
                          @endif  <!--# end if service---->
                    
                        </div>
    
    
                        <label>إرفاق ملف</label>
                        <input type="file" name="FILES" placeholder="إرفاق ملف">
                        <div class="btn btn-white btn-block">
                            <span><input type="submit" value="إرسال"></span>
                        </div>
                    </form>
                </div>
            <!------------------------------------------------------>


            <div class="col-xs-12 col-sm-4">
                @isset($index_setting)
                <div class="box black-box text-center">
                    <h3 class="main-heading">تفاصيل الاتصال</h3>

                    <p><i class="fa fa-envelope-o right-fa"></i> {{$index_setting->email}}</p>
                    <p><i class="fa fa-phone right-fa"></i> {{$index_setting->phone}}</p>
                </div>
                @endisset
                <div class="box black-box text-center">
                    <h3 class="main-heading">إشترك معنا</h3>

                    <form>
                        <input type="email" placeholder="بريدك الالكتروني">
                        <div class="btn btn-white btn-block">
                            <span><input type="submit" value="إشترك معنا"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
