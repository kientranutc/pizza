@extends('backend.layouts.masterpage')
@section('title', 'blog')
@section('breadcrumb')
    Blog
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <a href="{{URL::route('blog.create')}}" class="btn btn-success">Thêm mới</a>
        </div><!-- /page-title -->
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                Blog
            </div>
            <div class="padding-md clearfix">
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th width="5%" class="text-center">STT</th>
                        <th width="10%" class="text-center">Tiêu đề</th>
                        <th width="10%" class="text-center">Ảnh</th>
                        <th width="10%" class="text-center">Trạng thái</th>
                        <th width="10%" class="text-center">Người tạo</th>
                        <th width="10%" class="text-center">Ngày tạo</th>
                        <th width="10%" class="text-center">Người Cập nhât</th>
                        <th width="10%" class="text-center">Ngày Cập nhật</th>
                        <th width="20%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($data  as $item)
                        <tr>
                            <td class="text-center">{{++$stt}}</td>
                            <td class="text-center">{{$item->title}}</td>
                            <td class="text-center"><img src="{{$item->image}}" alt="{{$item->image}}"></td>
                            <td class="text-center">
                                @if($item->status==1)
                                    <span class="btn btn-success btn-sm">Hiển Thị</span>
                                @else
                                    <span class="btn btn-danger btn-sm">Ẩn</span>
                                @endif
                            </td>
                            <td class="text-center">{{$item->user_create}}</td>
                            <td class="text-center">{{$item->created_at}}</td>
                            <td class="text-center">{{$item->user_update}}</td>
                            <td class="text-center">{{$item->updated_at}}</td>
                            <td class="text-center">
                                <a href="{{URL::route('category.edit',$item->id)}}" data-toggle="tooltip" title="Xem chi tiết" class="btn btn-success"><i class="fa fa-eye fa-lg"></i></a>
                                <a href="{{URL::route('blog.edit',$item->id)}}" data-toggle="tooltip" title="Cập nhật" class="btn btn-success"><i class="fa fa-edit fa-lg"></i></a>
                                <a href="{{URL::route('blog.delete',$item->id)}}" data-toggle="tooltip" title="Xóa" data-toggle="modal"  class="btn btn-danger delete-view"><i class="fa fa-trash-o fa-lg"></i></a>
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
                    "targets": 8,
                    "orderable": false
                } ]
            });
        });
    </script>
@stop