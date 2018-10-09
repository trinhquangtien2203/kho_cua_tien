@extends('backend.master')
@section('title','Danh sách tin tức')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách tin tức</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách tin tức</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/news/add')}}" class="btn btn-primary">Thêm tin tức</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th class="text-center">ID</th>
											<th width="70%" class="text-center">Tiêu đề bài viết</th>																							
											<th class="text-center">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($list as $lists)
										<tr>
											<td class="text-center">{{$lists->news_id}}</td>
											<td class="text-center">{{$lists->news_title}}</td>
											<td class="text-center">
												<a href="{{asset('admin/news/edit/'.$lists->news_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{asset('admin/news/del/'.$lists->news_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true" ></i> Xóa</a>
											</td>
										</tr>
                                        @endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection