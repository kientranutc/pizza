@extends('backend.layouts.masterpage')
@section('title', 'Tài khoản khách hàng')
@section('breadcrumb')
    Sản phẩm đánh giá
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix text-right">
            <a href="{{URL::route('export-product-wish')}}" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Tải file excel</a>
        </div><!-- /page-title -->
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                Tài khoản khách hàng
            </div>
            <div class="padding-md clearfix">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th width="5%" class="text-center">STT</th>
                        <th width="15%" class="text-center">Tên sản phẩm</th>
                        <th width="20%" class="text-center">Giá</th>
                        <th width="15%" class="text-center">Tổng số sao đánh giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($productMaxStar  as $item)
                        <tr>
                            <td class="text-center">{{++$stt}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="text-center">{{number_format($item->price)}}đ</td>
                            <td class="text-center">{{floatval($item->sum_star/5)}}</td>
                        </tr>
                    @empty
                    @endforelse
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
                    "targets": 3,
                    "orderable": false
                } ]
            });
        });
    </script>
@stop