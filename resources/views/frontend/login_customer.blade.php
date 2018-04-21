@extends('frontend.layouts.submasterpage')
@section('title', 'Đăng ký tài khoản')
@section('content')
<div class="block_login">
    <div class="content-login">

        <div class="modal-login__content">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{session()->get('success')}}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> {{$errors->first()}}
                </div>
            @endif

            <form action="{{URL::route('login-account')}}" id="login-form" class="form form--login" method="post">
                <legend class="form__legend">Đăng nhập</legend>
                {{csrf_field()}}
                <div class="form__row">
                    <input type="text" name="phone" id="phone" class="form__input" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="form__row">
                    <input type="password" name="password" id="password" class="form__input" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="form__row form__row--action">
                    <div class="container_cbk">

                    </div>
                    <a href="" title="Quên mật khẩu?" class="link-forgot-pass js-forgot-pass">Quên mật khẩu?</a>
                </div>
                <div class="form__row form__row--button">
                    <input type="hidden" name="submitLogin" value="1">
                    <button type="submit" data-link-action="sign-in" class="btn btn-default js-btn-login">Đăng nhập</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop