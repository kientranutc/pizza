@extends('backend.layouts.masterpage')
@section('title', 'sản phẩm')
@section('breadcrumb')
    Sản phẩm
@stop
@section('content')
    <div class="panel panel-default table-responsive">
        <div class="panel-heading clearfix">
            <a href="{{URL::route('product.index')}}" class="btn btn-success">Về trang trước</a>
        </div><!-- /page-title -->
        <div class="panel-heading">Thêm mới sản phẩm </div>
        <div class="panel-body">
            <form class="no-margin" id="formValidate2" action="{{URL::route('product.create')}}" method="post" data-validate="parsley" novalidate>
                {{csrf_field()}}
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 {{($errors->has('name'))?'has-error':''}}">
                            <div class="form-group ">
                                <label class="control-label">Tên sản phẩm</label>
                                <input type="text" placeholder="sản phẩm" value="{{old('name')?old('name'):''}}"  name="name" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('name')}}</p>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-6 {{($errors->has('image'))?'has-error':''}}">
                            <div class="form-group">
                                <div id="show-image-add">
                                    <img src="" class="img-thumbnail"  alt="Cinque Terre" width="304" height="236">
                                </div>
                                <label class="control-label">Ảnh sản phẩm</label>
                                <input type="text" placeholder="Click để thêm ảnh sản phẩm" value="{{old('image')?old('image'):''}}"  name="image" class="form-control input-sm input-image" id="image-input" data-required="true" data-type="url">
                                <p class="text-danger"> {{$errors->first('image')}}</p>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label id="category_id" class="control-label">Danh mục</label>
                                <select name="category_id"  class="form-control input-sm" id="category_id">
                                    <option value="0">--Chọn--</option>
                                    @forelse($category as $item)
                                    <option value="{{$item->id}}" {{(old('category_id')==$item->id)?"selected":""}}>{{$item->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <p class="text-danger"> {{$errors->first('category_id')}}</p>
                            </div>
                        </div>
                        <div class="col-md-3 {{($errors->has('price'))?'has-error':''}}">
                            <div class="form-group">
                                <label class="control-label">Giá</label>
                                <input type="text" placeholder="giá" name="price" value="{{old('price')?old('price'):''}}" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('price')}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Trạng thái</label>
                                <div class="form-group">
                                    <label class="label-radio inline">
                                        <input type="radio" value="1" checked name="status">
                                        <span class="custom-radio"></span>
                                        Hiển thị
                                    </label>
                                    <label class="label-radio inline">
                                        <input type="radio" value="0" name="status">
                                        <span class="custom-radio"></span>
                                        Ẩn
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 {{($errors->has('sale'))?'has-error':''}}">
                            <div class="form-group">
                                <label class="control-label">Giảm giá</label>
                                <input type="text" placeholder="giảm giá" value="{{old('sale')?old('sale'):''}}"  name="sale" class="form-control input-sm" data-required="true" >
                                <p class="text-danger"> {{$errors->first('sale')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea class="form-control" placeholder="Mô tả sản phẩm" name="description" rows="3" data-required="true"></textarea>
                    </div><!-- /form-group -->
                </div>
                <div class="panel-footer text-center">
                    <button class="btn btn-success" type="submit">Thêm mới</button>
                    <button class="btn btn-danger" type="reset">Làm mới</button>
                </div>
            </form>
        </div>
    </div><!-- /panel -->

@stop
@section('script')
    <script src="{{asset('backend/tinymce_customize.js')}}"></script>
@stop