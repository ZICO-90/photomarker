@extends('admin.layouts-index')

@section('js')


	<script src="{{asset('manage/global_assets/js/fileinput/plugins/purify.min.js')}}"></script>
	<script src="{{asset('manage/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js')}}"></script>
	<script src="{{asset('manage/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
	<script src="{{asset('/anage/global_assets/js/demo_pages/uploader_bootstrap.js')}}"></script>
<!-- /theme JS files -->
@endsection
    
@section('contents')
<!-- Form horizontal -->
<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Basic form inputs</h5>
                        @include('admin.includse.alerts.errors')
					</div>

					<div class="panel-body">
                        <form action="{{route('admin.photos.master.update' , $photos->id)}}" method="POST" enctype="multipart/form-data">
                           
							{{method_field('put')}}
							@csrf

							<div class="panel-heading">
                                <h5 class="panel-title">قسم الصورة</h5>
                                <input type="text" name="title" accept="image/*" class="file-input" value="{{$photos->title}}" data-show-upload="false" data-show-caption="true" data-show-preview="true">
								@error('title')
								<span class="text-danger">{{$message}}</span>
								@enderror
                            </div>
                            <div class="panel-heading">
                                <h5 class="panel-title">قسم الصورة</h5>
                                <input type="file" name="file" accept="image/*" class="file-input"  data-show-upload="false" data-show-caption="true" data-show-preview="true">
								@error('file')
								<span class="text-danger">{{$message}}</span>
								@enderror
                            </div>
						
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
							</div>
                        </form>

					</div>
				</div>
				<!-- /form horizontal -->

@endsection