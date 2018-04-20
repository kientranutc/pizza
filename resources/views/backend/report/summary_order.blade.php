@extends('backend.layouts.masterpage')
@section('title', 'Doanh thu')
@section('breadcrumb')
    Doanh thu
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="row">
                <div class="col-md-6">
                    <form class="form-inline" action="" method="get">
                        <div class="form-group">
                            <label for="date">Thời gian:</label>
                            <select class="form-control" id="date" name="date">
                                <option value="-1">--Chọn thời gian--</option>
                                @foreach(Config('constant.select_date') as $k=>$v)
                                    <option value="{{$k}}" {{(Request::get('date', -1)==$k)?'selected':''}}>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-filter" aria-hidden="true"></i> Lọc</button>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{URL::route('export-summary-order',['date' =>(Request::has('date')?Request::get('date'):-1)])}}" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Tải file excel</a>

                </div>
            </div>
        </div><!-- /page-title -->
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                Doanh thu
            </div>
            <div class="padding-md clearfix">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th width="5%" class="text-center">STT</th>
                        <th width="15%" class="text-center">Tên sản phẩm</th>
                        <th width="20%" class="text-center">Giá bán</th>
                        <th width="15%" class="text-center">Giảm giá</th>
                        <th width="15%" class="text-center">Số lượng</th>
                        <th width="15%" class="text-center">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $total = 0;
                    ?>
                    @forelse ($dataSummaryOrder  as $item)
                        <tr>
                            <td class="text-center">{{++$stt}}</td>
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
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="5">Tổng tiền</td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td style="display: none;"></td>
                        <td class="text-center">{{number_format ($total)}}đ</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.padding-md -->
        </div>
        <!-- /panel -->
    </div>
@stop
@section('script')
    <script>
        $(function() {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                //edit name pagination
                "language": {
                    "paginate": {
                        "first":"Đầu",
                        "previous": "Trước",
                        "next":"Tiếp",
                        "last":"cuối"
                    },
                    "sLengthMenu": "Xem _MENU_ bản ghi",
                    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                    'sSearchPlaceholder':'Tìm kiếm'
                },
                "columnDefs": [ {
                    "targets": 5,
                    "orderable": false
                } ]
            });
        });
    </script>
@stop