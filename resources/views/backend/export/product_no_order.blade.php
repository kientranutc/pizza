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
        <th colspan="6" align="center">Thống kê sản phẩm tồn kho</th>
    </tr>

    <tr>
        <th>STT</th>
        <th>Sản phẩm</th>
        <th>Ảnh sản phẩm</th>
        <th>Giá</th>
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
            <td><img src="{{public_path('source/'.explode('/source', $item->image)[1])}}" alt="{{$item->image}}"></td>
            <td>{{number_format($item->price)}}đ</td>
        </tr>
        <?php
        $stt++;
        ?>
    @empty
        <tr>
            <td colspan="3">Dữ liệu trống</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>