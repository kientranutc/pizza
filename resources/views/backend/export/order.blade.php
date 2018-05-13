<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{ Html::style('backend/export_product_wish.css') }}
</head>
<body>
<table class="table table-striped table-bordered" id="dataTable">
    <thead>
    <tr>
        <th colspan="6" align="center">Hóa đơn đặt hàng</th>
    </tr>
    <tr>

    </tr>
    <tr>
        <th align="center" width="12">Mã hóa đơn:</th>
        <th align="center">{{$data['id']}}</th>
        <th align="right">Họ Tên:</th>
        <th>{{$data['fullname']}}</th>
    </tr>
    <tr>
        <th align="center" width="12">Ngày tạo:</th>
        <th>{{$data['date_order']}}</th>
        <th align="right">Tổng tiền:</th>
        <th>{{number_format($data['total'])}}đ</th>
    </tr>

    <tr></tr>
    <tr style="background: green; color: white">
        <th width="15" class="text-center">STT</th>
        <th width="20" class="text-center">Tên sản phẩm</th>
        <th width="20%" class="text-center">Giá bán</th>
        <th width="15%" class="text-center">Giảm giá</th>
        <th width="15%" class="text-center">Số lượng</th>
        <th width="15%" class="text-center">Thành tiền</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $total = 0;
    $stt=1;
    ?>
    @forelse ($data['content']  as $item)
        <tr>
            <td class="text-center">{{$stt}}</td>
            <td class="text-center">{{$item->product_name}}</td>
            <td class="text-center">{{$item->price}}</td>
            <td class="text-center">{{($item->sale>0)?$item->sale."(%)":""}}</td>
            <td class="text-center">{{$item->quantity}}</td>
            <td class="text-center">
                @if ($item->sale>0)
                    {{number_format (($item->price)*($item->quantity)*(1-(1/$item->sale)))}}đ
                    <?php
                    $total += ($item->price)*($item->quantity)*(1-(1/$item->sale));
                    ?>
                @else
                    {{number_format (($item->price)*($item->quantity))}}đ
                    <?php
                    $total += ($item->price)*($item->quantity);
                    ?>
                @endif
            </td>
        </tr>
        <?php
        $stt++;
        ?>
    @empty
    @endforelse
    <tr>
        <td colspan="5">Tổng tiền</td>

        <td class="text-center">{{number_format ($total)}}đ</td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="2">Người tạo: <b>{{Auth::user()->fullname}}</b></td>
    </tr>
    </tbody>
</table>
</body>
</html>