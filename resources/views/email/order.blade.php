<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<h2 style="margin-bottom: 20px; text-align: center">Thông tin đơn hàng </h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr style="background: green; color: white">
            <th class="text-center" width="5%">STT</th>
            <th class="text-center" width="15%">Sản phẩm</th>
            <th class="text-center" width="15%">Ảnh</th>
            <th class="text-center" width="10%">Số lượng</th>
            <th class="text-center" width="15%">Giá</th>
            <th class="text-center" width="10%">Giảm giá</th>
            <th class="text-center" width="15%">Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        @forelse($dataOrder as  $item)
            <tr>
                <td align="center">{{++$stt}}</td>
                <td align="center">{{$item->name}}</td>
                <td align="center">
                    <img src="{{public_path('frontend/assets/img/cake1.jpg')}}" width="50%" height="50%" alt=""></td>
                <td align="center"><input type="number" class="qty-update" min="1" data-cart="{{$item->rowId}}" value="{{$item->qty}}" ></td>
                <td align="center">{{number_format($item->options->price_unsale)}} đ</td>
                <td align="center">{{($item->options->sale>0)?$item->options->sale.'(%)':''}}</td>
                <td align="center">{{number_format($item->price*$item->qty)}} đ</td>

            </tr>

        @empty
        @endforelse
        <tr>
            <td colspan="6" style="color: red;">Tổng tiền</td>
            <td align="center">{{explode(',',\Cart::subtotal())[0]}},000 đ</td>
        </tr>
        </tbody>
    </table>

</div>
</body>
</html>