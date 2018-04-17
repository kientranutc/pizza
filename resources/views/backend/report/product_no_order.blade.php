@extends('backend.layouts.masterpage')
@section('title', 'Sản phẩm tồn kho')
@section('breadcrumb')
    Sản phẩm tồn kho
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
                   <a href="{{URL::route('export-product-no-order',['date' =>(Request::has('date')?Request::get('date'):-1)])}}" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Tải file excel</a>

               </div>
           </div>
        </div><!-- /page-title -->
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                Sản phẩm tồn kho
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
                    @forelse ($dataProductNoOrder  as $item)
                        <tr>
                            <td class="text-center">{{++$stt}}</td>
                            <td class="text-center">{{$item->name}}</td>
                            <td class="text-center"><img src="{{$item->image}}" alt="{{$item->image}}"></td>
                            <td class="text-center">{{number_format($item->price)}}đ</td>
                            
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