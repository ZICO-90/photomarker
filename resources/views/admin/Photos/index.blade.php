@extends('admin.layouts-index')

             
                    
@section('contents')    

				
                    <div class="row">
						@include('admin.includse.alerts.success')
						@include('admin.includse.alerts.errors')
					@foreach( $photos as $item)
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
											<li><a href="{{route('admin.photos.details' , $item->id)}}" class="heading-text pull-right">عرض </a> </li>

								         	<li><a href="{{route('admin.photos.master.edit' , $item->id)}}" class="heading-text pull-right">تعديل </a>  </li>
								         	<li><a href="{{route('admin.photos.delete.master' , $item->id)}}" class="heading-text pull-right">حذف </a>  </li>
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