@extends('backend.layouts.masterpage')
@section('title', 'Danh mục')
@section('breadcrumb')
Danh mục
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-heading clearfix">
		<a href="{{URL::route('category.create')}}" class="btn btn-success">Thêm mới</a>
	</div><!-- /page-title -->
	<div class="panel panel-default table-responsive">
                    <div class="panel-heading">
                        Danh mục
                        <span class="label label-info pull-right">790 Items</span>
                    </div>
                    <div class="padding-md clearfix">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sales</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1001</td>
                                    <td>Leather Bag</td>
                                    <td>$89</td>
                                    <td>30</td>
                                    <td>187</td>
                                    <td>Oct 08,2013</td>
                                    <td><span class="label label-success">In Stock</span></td>
                                </tr>
                                <tr>
                                    <td>#1002</td>
                                    <td>Brown Sunglasses <span class="label label-success m-left-xs">Best Seller</span> </td>
                                    <td>$120</td>
                                    <td>0</td>
                                    <td>861</td>
                                    <td>Oct 07,2013</td>
                                    <td><span class="label label-danger">Sold Out</span></td>
                                </tr>
                                <tr>
                                    <td>#1003</td>
                                    <td>Casual Boots</td>
                                    <td>$99</td>
                                    <td>100</td>
                                    <td>12</td>
                                    <td>Oct 06,2013</td>
                                    <td><span class="label label-success">In Stock</span></td>
                                </tr>
                                <tr>
                                    <td>#1004</td>
                                    <td>Lambskin Sport Coat</td>
                                    <td>$4000</td>
                                    <td>7</td>
                                    <td>41</td>
                                    <td>Oct 06,2013</td>
                                    <td><span class="label label-success">In Stock</span></td>
                                </tr>
                                <tr>
                                    <td>#1005</td>
                                    <td>Summer Dress</td>
                                    <td>$310</td>
                                    <td>25</td>
                                    <td>39</td>
                                    <td>Oct 05,2013</td>
                                    <td><span class="label label-success">In Stock</span></td>
                                </tr>
                                <tr>
                                    <td>#1006</td>
                                    <td>Duffle Coat</td>
                                    <td>$80</td>
                                    <td>0</td>
                                    <td>20</td>
                                    <td>Sep 30,2013</td>
                                    <td><span class="label label-danger">Sold out</span></td>
                                </tr>
                                <tr>
                                    <td>#1007</td>
                                    <td>Universal Camera Case</td>
                                    <td>$35</td>
                                    <td>30</td>
                                    <td>3</td>
                                    <td>Sep 29,2013</td>
                                    <td><span class="label label-success">In Stock</span></td>
                                </tr>
                                <tr>
                                    <td>#1008</td>
                                    <td>Leopard Rose Dress</td>
                                    <td>$1500</td>
                                    <td>10</td>
                                    <td>1</td>
                                    <td>Sep 27,2013</td>
                                    <td><span class="label label-success">In Stock</span></td>
                                </tr>
                                <tr>
                                    <td>#1009</td>
                                    <td>Casual stripe</td>
                                    <td>$50</td>
                                    <td>30</td>
                                    <td>25</td>
                                    <td>Sep 27,2013</td>
                                    <td><span class="label label-success">Sold out</span></td>
                                </tr>
                                <tr>
                                    <td>#1010</td>
                                    <td>Italian shirt</td>
                                    <td>$70</td>
                                    <td>40</td>
                                    <td>4</td>
                                    <td>Sep 27,2013</td>
                                    <td><span class="label label-info">Promotion</span></td>
                                </tr>
                                <tr>
                                    <td>#1011</td>
                                    <td>Iphone 5</td>
                                    <td>$400</td>
                                    <td>300</td>
                                    <td>152</td>
                                    <td>Sep 27,2013</td>
                                    <td><span class="label label-danger">In stock</span></td>
                                </tr>
                                <tr>
                                    <td>#1012</td>
                                    <td>Ipad</td>
                                    <td>$350</td>
                                    <td>46</td>
                                    <td>103</td>
                                    <td>Sep 25,2013</td>
                                    <td><span class="label label-success">In Stock</span></td>
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
            });
        });
    </script>
@stop