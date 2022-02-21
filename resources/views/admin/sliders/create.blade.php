@extends('admin.layouts-index')


@section('contents')
<!-- Form horizontal -->
<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">معرض الصور</h5>
                        @include('admin.includse.alerts.errors')
					</div>

					<div class="panel-body">
                        <form action="{{route('admin.sliders.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
							
                            <div class="panel-heading">
                                <h5 class="panel-title">صور slider</h5>
                                <input type="file" name="file" accept="image/*" class="form-control"  data-show-upload="false" data-show-caption="true" data-show-preview="true">
								@error('file')
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