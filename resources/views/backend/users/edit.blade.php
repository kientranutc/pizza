@extends('backend.layouts.masterpage')
@section('title', 'Cập nhật người dùng')
@section('breadcrumb')
    Cập nhật người dùng
@stop
@section('content')
    <div class="panel panel-default table-responsive">
        <div class="panel-heading clearfix">
            <a href="{{URL::route('user.index')}}" class="btn btn-success">Về trang trước</a>
        </div><!-- /page-title -->
        <div class="panel-heading">Cập nhât người dùng</div>
        <div class="panel-body">
            <form class="no-margin" id="formValidate2" action="{{URL::route('user.edit',$dataUser->id)}}" method="post" data-validate="parsley" novalidate>
                {{csrf_field()}}
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 {{($errors->has('name'))?'has-error':''}}">
                            <div class="form-group ">
                                <label class="control-label">Username</label>
                                <input type="text" placeholder="Username" value="{{old('name')?old('name'):$dataUser->name}}" disabled="disabled"  name="name" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('name')}}</p>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-6 {{($errors->has('image'))?'has-error':''}}">
                            <div class="form-group">
                                <div id="show-image-add">
                                    <img src="" class="img-thumbnail"  alt="Cinque Terre" width="304" height="236">
                                </div>
                                <label class="control-label">Ảnh đại diện</label>
                                <input type="text" placeholder="Click để thêm ảnh đại diện" value="{{old('image')?old('image'):$dataUser->image}}"  name="image" class="form-control input-sm input-image" id="image-input" data-required="true" data-type="url">
                                <p class="text-danger"> {{$errors->first('image')}}</p>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label id="category_id" class="control-label">Email</label>
                                <input type="text" placeholder="email" value="{{old('email')?old('email'):$dataUser->email}}" disabled="disabled"  name="email" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('email')}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 {{($errors->has('fullname'))?'has-error':''}}">
                            <div class="form-group">
                                <label class="control-label">Họ tên</label>
                                <input type="text" placeholder="Họ tên" name="fullname" value="{{old('fullname')?old('fullname'):$dataUser->fullname}}" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('fullname')}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label id="role_id" class="control-label">Quyền</label>
                                <select name="role_id"  class="form-control input-sm" id="role_id">
                                    <option value="0">--Chọn--</option>
                                    @forelse($role as $item)
                                        <option value="{{$item->id}}" {{($currentRole==$item->id)?"selected":""}}>{{$item->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <p class="text-danger"> {{$errors->first('role_id')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label id="Mật khẩu" class="control-label">Mật khẩu hiện tại</label>
                                <input type="password" placeholder="Mật khẩu hiện tại"   name="current_password" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('current_password')}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label id="Mật khẩu" class="control-label">Mật khẩu mới</label>
                                <input type="password" placeholder="Mật khẩu mới" value="{{old('password')?old('password'):''}}"  name="password" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('password')}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 {{($errors->has('c_password'))?'has-error':''}}">
                            <div class="form-group">
                                <label class="control-label">Nhập lại mật khẩu mới</label>
                                <input type="password" placeholder="Nhập lại mật khẩu" name="c_password" class="form-control input-sm" data-required="true">
                                <p class="text-danger"> {{$errors->first('c_password')}}</p>
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
