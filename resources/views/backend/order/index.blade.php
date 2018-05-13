@extends('backend.layouts.masterpage')
@section('title', 'Quản lý đơn hàng')
@section('breadcrumb')
    Quản lý đơn hàng
@stop
@section('content')
    <div class="panel panel-default">

        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                Đơn hàng
            </div>
            <div class="padding-md clearfix">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th width="5%" class="text-center">STT</th>
                        <th width="15%" class="text-center">Khách hàng</th>
                        <th width="10%" class="text-center">Ngày đặt hàng</th>
                        <th width="20%" class="text-center">Địa chỉ khách hàng</th>
                        <th width="10%" class="text-center">Số điện thoại</th>
                        <th width="10%" class="text-center">Ghi chú</th>
                        <th width="10%" class="text-center">Tổng tiền</th>
                        <th width="10%" class="text-center">Trạng thái</th>
                        <th width="15%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($dataOrder  as $item)
                        <tr>
                            <td class="text-center">{{++$stt}}</td>
                            <td class="text-center">{{$item->customer_name}}</td>
                            <td class="text-center">{{$item->date_order}}</td>
                            <td class="text-center">{{$item->customer_address}}</td>
                            <td class="text-center"><a href="tel:{{$item->customer_phone}}" class="btn btn-success btn-sm"> <i class="fa fa-phone fa-lg"></i> {{$item->customer_phone}}</a></td>
                            <td class="text-center">{{$item->note}}</td>
                            <td class="text-center">{{number_format($item->total).' đ'}}</td>
                            <td class="text-center">
                                @if($item->status==1)
                                    <span class="btn btn-success btn-sm">Đã giao hàng</span>
                                @else
                                    <span class="btn btn-danger btn-sm">Mới đặt hàng</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->status==0)
                                    <a href="{{URL::route('order.change-status',[$item->id, $item->status])}}" data-toggle="tooltip" title="Cập nhật" class="btn btn-success"><i class="fa fa-edit fa-lg"></i></a>
                                @endif
                                <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$item->id}}" title="Xem chi tiết" class="btn btn-success show-order-detail"><i class="fa fa-eye fa-lg"></i></a>
                                    <a href="{{URL::route('export-order', $item->id)}}" data-toggle="tooltip" data-id="{{$item->id}}" title="In hóa đơn" class="btn btn-success order-excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                            </td>
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
    <div id="showOrderDetail" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết đơn hàng</h4>
                </div>
                <div class="modal-body" id="content-order-detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script>
        var host = window.location.href;
        host = host.split('/');
        var url = host[0] + "//" + host[2] + "/";
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
                    "targets": 8,
                    "orderable": false
                } ]
            });
            $(document).on('click', '.show-order-detail', function(event){
               event.preventDefault();
               var id = $(this).data('id');
                $('#showOrderDetail').modal().find('#content-order-detail').load(url+"admin/order/show-detail/"+id+" #orderDetailTable");
            });
        });
    </script>
@stop