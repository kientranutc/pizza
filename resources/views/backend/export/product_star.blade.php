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
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="6" align="center">Thống kê sản phẩm được đánh giá</th>
    </tr>

    <tr>
        <th>STT</th>
        <th>Sản phẩm</th>
        <th>Giá</th>
        <th>Đánh giá trung bình(5*)</th>
    </tr>
    </thead>
    <tbody>
    <?php
            $stt=1;
    ?>
    @forelse($data as $item)
    <tr>
        <td>{{++$stt}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->sum_star}}</td>
    </tr>
    <?php
    $stt++;
    ?>
    @empty
        <tr>
            <td colspan="3">Dữ liệu trống</td>
        </tr>
    @endforelse
    <tr>

    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Người tạo: <b>{{Auth::user()->fullname}}</b></td>
    </tr>
    </tbody>
</table>

</body>
</html>