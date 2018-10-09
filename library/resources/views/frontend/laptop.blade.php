@extends('frontend.master')
@section('title','Laptop')
@section('main')

					<div id="wrap-inner">
						<div class="products">
							<h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
								@foreach($list as $lists)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('library/storage/app/avarta/'.$lists->splap_img)}}" class="img-thumbnail" style="height:150px"></a>
									<p><a href="#">{{$lists->splap_name}}</a></p>
									<p class="price">{{$lists->splap_price}}</p>	  
									<div class="marsk">
										<a href="{{asset('laptop/detail/'.$lists->splap_id.'/'.$lists->splap_slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
							</div>                	                	
						</div>

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
								@foreach($prod as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('library/storage/app/avarta/'.$item->splap_img)}}" class="img-thumbnail" style="height:150px"></a>
									<p><a href="#">{{$item->splap_name}}</a></p>
									<p class="price">{{$item->splap_price}}</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$item->splap_id.'/'.$item->splap_slug.'.html')}}">Xem chi tiết</a>
									</div>                      	                        
								</div>
								@endforeach
							</div>    
						</div>
					</div>
@stop
					