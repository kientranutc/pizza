@extends('frontend.layouts.submasterpage')
@section('title', 'Đăng ký tài khoản')
@section('content')
    <div class="block_register">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{session()->get('success')}}
            </div>
        @endif
        <div class="block__header">
            <h2 class="block__title">Tạo tài khoản</h2>
        </div>
        <form action="{{URL::route('register')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name" class="form__label">Tên*</label>
                <input type="text" class="form-control form__input" value="{{old('name')}}"  name="name" placeholder="Tên" id="name">
                <p class="text-danger">{{$errors->first('name')}}</p>
            </div>
            <div class="form-group">
                <label for="phone" class="form__label">Điện thoại*</label>
                <input type="text" placeholder="phone" name="phone" value="{{old('phone')}}" class="form-control form__input" id="phone">
                <p class="text-danger">{{$errors->first('phone')}}</p>
            </div>
            <div class="form-group">
                <label for="email" class="form__label">Hộp thư*</label>
                <input type="email" placeholder="email" value="{{old('email')}}" name="email" class="form-control form__input" id="email">
                <p class="text-danger">{{$errors->first('email')}}</p>
            </div>
            <div class="form-group" >
                <label for="pwd" class="form__label">Mật khẩu*:</label>
                <input type="password" placeholder="Mật khẩu" name="password" class="form-control form__input" id="pwd">
                <p class="text-danger">{{$errors->first('password')}}</p>
            </div>
            <div class="form-group">
                <label for="c_password" class="form__label">Xác nhận mật khẩu*</label>
                <input type="password" name="c_password" placeholder="xác nhận mật khẩu" class="form-control form__input" id="c_password">
                <p class="text-danger">{{$errors->first('c_password')}}</p>
            </div>
            <div class="register-action">
                <button type="submit" class="btn btn-default submit-register">Tạo tài khoản</button>
            </div>

        </form>
    </div>
@stop