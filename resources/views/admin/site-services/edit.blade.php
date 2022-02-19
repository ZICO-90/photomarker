
@extends('admin.layouts-index')


@section('contents')

<div class="box box-info">
  <div class="box-header">
    
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div><!-- /. tools -->
  </div><!-- /.box-header -->
  <form action="{{route('admin.site.services.update' ,$site_service->id )}}" method="POST">
    {{method_field('put')}} 
    @csrf
  <div class="panel-heading">
      <h5 class="panel-title">العنوان</h5>
      <input type="text" name="title" value="{{$site_service->title}}" class="form-control input-lg"  data-show-upload="false" data-show-caption="true" data-show-preview="true">
      @error('title')
      <span class="text-danger">{{$message}}</span>
      @enderror
 
  <div class="box-body pad">
    <textarea class="textarea" placeholder="Place some text here"   name="body" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$site_service->body!!}</textarea>
 
      @error('body')
      <span class="text-danger">{{$message}}</span>
      @enderror
 
  </div>


  <div class="text-right">
      <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
  </div>
</form>
</div>
  @endsection


  @section('js')



    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
  @endsection

  