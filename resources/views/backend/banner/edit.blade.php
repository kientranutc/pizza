@extends('backend.layouts.masterpage')
@section('title', 'Cập nhật banner')
@section('breadcrumb')
    Cập nhật banner
@stop
@section('content')
    <div class="panel panel-default table-responsive">
        <div class="panel-heading clearfix">
            <a href="{{URL::route('banner.index')}}" class="btn btn-success">Về trang trước</a>
        </div><!-- /page-title -->
        <div class="panel-heading">Cập nhật banner </div>
        <div class="panel-body">
            <form class="no-margin" id="formValidate2" action="{{URL::route('banner.edit', $data->id)}}" method="post" data-validate="parsley" novalidate>
                {{csrf_field()}}
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 {{($errors->has('title'))?'has-error':''}}">
                            <div class="form-group ">
                                <label class="control-label">Tiêu đề banner</label>
                                <input type="text" placeholder="Tên dịch vụ" value="{{old('title')?old('title'):$data->title}}"  name="title" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('title')}}</p>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-6 {{($errors->has('image'))?'has-error':''}}">
                            <div class="form-group">
                                <div id="show-image-add">
                                    <img src="" class="img-thumbnail"  alt="Cinque Terre" width="304" height="236">
                                </div>
                                <label class="control-label">Ảnh banner</label>
                                <input type="text" placeholder="Click để thêm ảnh sản phẩm" value="{{old('image')?old('image'):$data->image}}"  name="image" class="form-control input-sm input-image" id="image-input" data-required="true" data-type="url">
                                <p class="text-danger"> {{$errors->first('image')}}</p>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-6 {{($errors->has('url'))?'has-error':''}}">
                            <div class="form-group ">
                                <label class="control-label">Link liên kết</label>
                                <input type="text" placeholder="Link liên kết" value="{{old('url')?old('url'):$data->url}}"  name="url" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('url')}}</p>
                            </div>
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Trạng thái</label>
                                <div class="form-group">
                                    <label class="label-radio inline">
                                        <input type="radio" value="1"
                                               @if($data->status == 1)
                                               {{"checked"}}
                                               @endif
                                               name="status">
                                        <span class="custom-radio"></span>
                                        Hiển thị
                                    </label>
                                    <label class="label-radio inline">
                                        <input type="radio" value="0"
                                               @if($data->status == 0)
                                               {{"checked"}}
                                               @endif
                                               name="status">
                                        <span class="custom-radio"></span>
                                        Ẩn
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div><!-- /panel -->
@stop