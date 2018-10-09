@extends('backend.master')
@section('title','Thêm tin tức')
@section('main')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tin tức</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Thêm tin tức</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
								@include('error.note')
									<div class="form-group" >
										<label>Tiêu đề bài viết</label>
										<input required type="text" name="name" class="form-control">
									</div>

									<div class="form-group" >
										<label></label>
										<textarea class="ckeditor" required name="description"></textarea>
										<script type="text/javascript">
											var editor = CKEDITOR.replace('description',{
												language:'vi',
												filebrowserImageBrowseUrl: '../../layout/backend/ckfinder/ckfinder.html?Type=Images',
												filebrowserFlashBrowseUrl: '../../layout/backend/ckfinder/ckfinder.html?Type=Flash',
												filebrowserImageUploadUrl: '../../layout/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											});
										</script>

									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection	