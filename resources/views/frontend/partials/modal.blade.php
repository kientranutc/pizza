<div id="notification-add-cart" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success">
                    Bạn đã thêm sản phẩm vào giỏ hàng
                </div>
            </div>

        </div>

    </div>
</div>
<div id="notification-rate-star" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-center">
                    Cảm ơn bạn đã đánh giá !
                </div>
            </div>

        </div>

    </div>
</div>
<div id="modalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đăng nhập</h4>
            </div>
            <div class="modal-body">
                <div class="modal-login__content">
                    <form action="{{URL::route('login-account')}}" id="login-form" class="form form--login" method="post">
                        <legend class="form__legend">Đăng nhập</legend>
                        {{csrf_field()}}
                        <div class="form__row">
                            <input type="text" name="phone" id="phone" class="form__input" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="form__row">
                            <input type="password" name="password" id="password" class="form__input" placeholder="Nhập mật khẩu" required>
                        </div>

                        <div class="form__row form__row--button">
                            <input type="hidden" name="submitLogin" value="1">
                            <button type="submit" data-link-action="sign-in" class="btn btn-default js-btn-login">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>