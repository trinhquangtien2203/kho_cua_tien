@extends('frontend.master')
@section('title','Trang chủ')
@section('main')

					<div id="wrap-inner">
						<div class="products">
							<h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
								@foreach($featured as $fea)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('library/storage/app/avarta/'.$fea->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$fea->prod_name}}</a></p>
									<p class="price">{{$fea->prod_price}}</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$fea->prod_id.'/'.$fea->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
							</div>                	                	
						</div>

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
								@foreach($news as $new)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('library/storage/app/avarta/'.$new->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$new->prod_name}}</a></p>
									<p class="price">{{$new->prod_price}}</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$new->prod_id.'/'.$new->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                      	                        
								</div>
								@endforeach
							</div>    
						</div>
					</div>
@stop
					