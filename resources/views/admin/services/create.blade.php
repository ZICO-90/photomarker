@extends('admin.layouts-index')

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  

<script>
$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper   		= $(".box-body-One"); //Fields wrapper 
var add_button      = $(".add_field_button"); //Add button ID


var x = 1; 

$(add_button).click(function(e){ //on add input button click
e.preventDefault();
    if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div class="form-group""> <input type="text" class="form-control input-lg" name="photo_service[]" placeholder="ادخل اسم الخدمه">  <div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>'); //add input box
    }
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});



</script>



<script>
  $(document).ready(function() {
  var max_fields_two      = 10; 
  var wrapper_two   		= $(".box-body-two");
  var add_button_two  =  $(".add_field_button_two");
  
  var y = 1; 

  $(add_button_two).click(function(e){ 
  e.preventDefault();
      if(y < max_fields_two ){ 
        y++; 
          $(wrapper_two).append('<div class="form-group""> <input type="text" class="form-control input-lg" name="type_service[]" placeholder="ادخل اسم الخدمه">  <div class="input-group-append"><button class="btn btn-outline-danger remove_field_two" type="button">Remove</button></div></div>'); //add input box
      }
  });
  
  $(wrapper_two).on("click",".remove_field_two", function(e){ //user click on remove text
      e.preventDefault(); $(this).parent('div').parent('div').remove(); y--;
      })
  });
  
  
  </script>

@endsection

@section('contents')

<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">الخدمات</h3>
      @include('admin.includse.alerts.errors')
    </div><!-- /.box-header -->
    <!-- form start -->
    <form action="{{route('admin.services.store')}}" method="POST">
      @csrf
      <div class="box-body">
        <div class="form-group">
        
          <input type="text" class="form-control" name="name" placeholder="ادخل اسم الخدمه">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">نوع البيانات *</h3>
            </div>

            <div class="box-body box-body-two">
              <input class="form-control input-lg" type="text"  name="type_service[]" placeholder="داخل نوع البيانات">
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
              <br>
              <button class="add_field_button">انشاء عنصر</button>
              
            </div>
          </div>

          
        </div>
      </div><!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">انشاء خدمه</button>
      </div>
    </form>
  </div>
@endsection