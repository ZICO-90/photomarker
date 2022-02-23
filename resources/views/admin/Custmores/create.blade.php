@extends('admin.layouts-index')

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  

<script>
$(document).ready(function() {
var max_fields      = 10; //maximum input boxes allowed
var wrapper   		= $(".form-group"); //Fields wrapper 
var add_button      = $(".add_field_button"); //Add button ID


var x = 1; 

$(add_button).click(function(e){ //on add input button click
e.preventDefault();
    if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div class="form-group">  <input type="text" class="form-control input-lg"  name="title[]" >  <input type="file" class="form-control input-lg" name="files[]" >  <div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>'); //add input box
    }
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
    })
});



</script>



@endsection

@section('contents')

<div class="box box-primary">
    <div class="box-header with-border">
      @include('admin.includse.alerts.errors')
    </div><!-- /.box-header -->
    <!-- form start -->
    <form action="{{route('admin.custmores.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <div class="box box-success">
            <div class="box-header with-border">
              <input type="text" class="form-control input-lg"  name="title[]" >
              @error('title.*')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="box-body">
              <input type="file" class="form-control input-lg"  name="files[]" >
              @error('files')
              <span class="text-danger">{{$message}}</span>
              @enderror
              @error('files.*')
              <span class="text-danger">{{$message}}</span>
              @enderror
              <br>
              <button class="add_field_button">انشاء عميل اخر</button>
              
            </div>

          </div>

          
        </div>
      </div><!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">انشاء </button>
      </div>
    </form>
  </div>
@endsection