@extends('frontend.layouts.submasterpage')
@section('title', 'Đăng ký tài khoản')
@section('content')
<div class="block_login">
    <div class="content-login">
        <div class="modal-login__content">
            <form action="{{URL::route('login-account')}}" id="login-form" class="form form--login" method="post">
                <legend class="form__legend">Đăng nhập</legend>
                {{csrf_field()}}
                <div class="form__row">
                    <input type="text" name="phone" id="phone" class="form__input" placeholder="Nhập số điện thoại">
                </div>
                <div class="form__row">
                    <input type="password" name="password" id="password" class="form__input" placeholder="Nhập mật khẩu">
                </div>
                <div class="form__row form__row--action">
                    <div class="container_cbk">

                    </div>
                    <a href="http://thepizzacompany.vn/vn/password-recovery" title="Quên mật khẩu?" class="link-forgot-pass js-forgot-pass">Quên mật khẩu?</a>
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