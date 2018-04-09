@extends('backend.layouts.masterpage')
@section('title', 'Người dùng')
@section('breadcrumb')
    Quản lý user
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <a href="{{URL::route('user.create')}}" class="btn btn-success">Thêm mới</a>
        </div><!-- /page-title -->
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                Người dùng
            </div>
            <div class="padding-md clearfix">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th width="10%" class="text-center">STT</th>
                        <th width="15%" class="text-center">Username</th>
                        <th width="15%" class="text-center">Email</th>
                        <th width="15%" class="text-center">Họ tên</th>
                        <th width="10%" class="text-center">Quyền</th>
                        <th width="10%" class="text-center">Trạng thái</th>
                        <th width="20%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($data  as $item)
                        <tr>
                            <td class="text-center">{{++$stt}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="text-center">{{$item->email}}</td>
                            <td class="text-center">{{$item->fullname}}</td>
                            <td class="text-center">{{$item->role_name}}</td>
                            <td class="text-center">
                                @if($item->active==1)
                                    <span class="btn btn-danger btn-sm">Lock</span>
                                @else
                                    <span class="btn btn-success btn-sm">Unlock</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->active==1)
                                    <a href="{{URL::route('user.lock',[$item->id, $item->active])}}" class="btn btn-success"><i class="fa fa-edit fa-lg"></i> Unlock</a>
                                @else
                                    @if ($item->is_admin != 1)
                                    <a href="{{URL::route('user.lock',[$item->id, $item->active])}}" class="btn btn-danger"><i class="fa fa-edit fa-lg"></i>lock</a>
                                    @endif
                                @endif
                                <a href="{{URL::route('user.edit',$item->id)}}" class="btn btn-success"><i class="fa fa-edit fa-lg"></i> cập nhật</a>
                                    @if ($item->is_admin != 1)
                                        <a href="{{URL::route('user.delete',$item->id)}}" data-toggle="modal"  class="btn btn-danger delete-view"><i class="fa fa-trash-o fa-lg"></i> xóa</a>
                                    @endif
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
                    "targets": 6,
                    "orderable": false
                } ]
            });
        });
    </script>
@stop