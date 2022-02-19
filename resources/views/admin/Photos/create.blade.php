@extends('admin.layouts-index')

@section('js')


	<script src="{{asset('manage/global_assets/js/fileinput/plugins/purify.min.js')}}"></script>
	<script src="{{asset('manage/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js')}}"></script>
	<script src="{{asset('manage/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
	<script src="{{asset('manage/global_assets/js/demo_pages/uploader_bootstrap.js')}}"></script>
<!-- /theme JS files -->
@endsection
    
@section('contents')
<!-- Form horizontal -->
<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">معرض الصور</h5>
                        @include('admin.includse.alerts.errors')
					</div>

					<div class="panel-body">
                        <form action="{{route('admin.photos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="panel-heading">
                                <h5 class="panel-title">عنوان الصورة الرئيسية</h5>
                                <input type="text" name="title" accept="image/*" class="form-control"  data-show-upload="false" data-show-caption="true" data-show-preview="true">
								@error('title')
								<span class="text-danger">{{$message}}</span>
								@enderror
                            </div>
                            <div class="panel-heading">
                                <h5 class="panel-title">الصورة الرئيسية للقسم</h5>
                                <input type="file" name="file" accept="image/*" class="form-control"  data-show-upload="false" data-show-caption="true" data-show-preview="true">
								@error('file')
								<span class="text-danger">{{$message}}</span>
								@enderror
                            </div>

                            <div class="panel-heading">
                                <h5 class="panel-title">الصور الاخري للقسم </h5>
                                <input type="file" name="files[]" accept="image/*" class="form-control" multiple="multiple" data-show-upload="false" data-show-caption="true" data-show-preview="true">
								@error('files')
								<span class="text-danger">{{$message}}</span>
								@enderror
                            </div>

						
							<div class="text-right">
								<button type="submit" class="btn btn-primary">حفظ <i class="icon-arrow-left13 position-right"></i></button>
							</div>
                        </form>

					</div>
				</div>
				<!-- /form horizontal -->

@endsection