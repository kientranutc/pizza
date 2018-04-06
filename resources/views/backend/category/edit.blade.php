@extends('backend.layouts.masterpage')
@section('title', 'Cập nhật danh mục')
@section('breadcrumb')
cập nhật danh mục
@stop
@section('content')
<div class="panel panel-default table-responsive">
	<div class="panel-heading clearfix">
		<a href="{{URL::route('category.index')}}" class="btn btn-success">Về trang trước</a>
	</div><!-- /page-title -->
		<div class="panel-heading">Thêm mới danh mục</div>
			<div class="panel-body">
				<form action="{{URL::route('category.edit', $data->id)}}" method="post">
				{{csrf_field()}}
					<div class="form-group {{($errors->has('name'))?'has-error':''}}">
						<label for="exampleInputEmail1">Tên danh mục</label>
						<input type="text" name="name" value="{{(old('name'))?old('name'):$data->name}}" class="form-control input-sm" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
						<p class="text-danger"> {{$errors->first('name')}}</p>
					</div><!-- /form-group -->
					<div class="form-group">
						<label class="label-checkbox">
							Trạng thái
							<input type="checkbox" name="active"{{($data->active == 1)?'checked':''}}>
							<span class="custom-checkbox"></span>
							</label>
					</div><!-- /form-group -->
					<div class="text-center">
						<button type="submit" class="btn btn-success btn-sm">Cập nhật</button>
					</div>
				</form>
			</div>
	</div><!-- /panel -->

@stop