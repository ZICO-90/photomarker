@extends('admin.layouts-index')

             
                    
@section('contents')    

				
                    <div class="row">

						@include('admin.includse.alerts.success')
						@include('admin.includse.alerts.errors')
					@foreach( $photos->photos as $item)
                        <div class="col-md-4">
					
							<div class="panel panel-flat">
							
								<div class="panel-body">
									<div class="thumb content-group">
										<img src="{{asset('storage/'.$item->url)}}" alt="" class="img-responsive">
                                       
										<div class="caption-overflow">
											<span>
												<a href="" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-arrow-right8"></i></a>
											</span>
										</div>
									</div>

								</div>

								<div class="panel-footer panel-footer-condensed">

									<div class="heading-elements not-collapsible">
										<ul class="list-inline list-inline-separate heading-text text-muted">
					
								         	<li><a href="{{route('admin.photos.delete',$item-> id)}}" class="btn btn-danger">حذف </a>  </li>

											 <form id="form-update-{{$item-> id}}" action="{{route('admin.photos.details.update',$item-> id)}}" method="POST" enctype="multipart/form-data">
												@csrf

												<div class="panel-heading">
													<h5 class="panel-title">تعديل</h5>
													<input type="file" name="file_{{$item-> id}}" accept="image/*" class="file-input" >
													@error('file_'.$item-> id)
													<span class="text-danger">{{$message}}</span>
													@enderror
												</div>
												

												<div class="text-right">
													<button type="submit"  class="btn btn-primary">Submit</button>
												</div>
												

											 </form>
										</ul>


									

									

									</div>
								</div>
								
							</div>
							
						</div>
						@endforeach
						
              

					
				</div>
			<!-- /post grid -->

                      	<!-- Pagination -->
				

				
                            
                               
					<!-- /pagination -->
@endsection    