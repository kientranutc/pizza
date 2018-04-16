@extends('backend.layouts.masterpage')
@section('title', 'Tài khoản khách hàng')
@section('breadcrumb')
    Tài khoản khách hàng
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
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
                        <th width="15%" class="text-center">Tên tài khoản</th>
                        <th width="20%" class="text-center">Họ tên</th>
                        <th width="15%" class="text-center">Email</th>
                        <th width="20%" class="text-center">Điện thoại</th>
                        <th width="20%" class="text-center">Địa chỉ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($accountCustomer  as $item)
                        <tr>
                            <td class="text-center">{{++$stt}}</td>
                            <td class="text-center">{{$item->username}}</td>
                            <td class="text-center">{{$item->fullname}}</td>
                            <td class="text-center">{{$item->email}}</td>
                            <td class="text-center">{{$item->phone}}</td>
                            <td class="text-center">{{$item->address}}</td>
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
                    "targets": 5,
                    "orderable": false
                } ]
            });
        });
    </script>
@stop