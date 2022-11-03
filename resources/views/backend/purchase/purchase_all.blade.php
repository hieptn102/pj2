@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Đơn hàng</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('purchase.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Thêm mới đơn hàng</a>
                    <br><br>
                    <h4 class="card-title">Danh sách đơn hàng</h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th> 
                            <th>Ngày mua</th>
                            <th>Nhà cung cấp</th> 
                            <th>Loại</th> 
                            <th>Qty</th>
                            <th>Tên sản phẩm</th> 
                            <th>Trạng thái</th> 
                            <th>Action</th> 
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->purchase_no }} </td>
                            <td> {{ date('d-m-Y',strtotime($item->date)) }} </td> 
                            <td> {{ $item['supplier']['name'] }} </td> 
                            <td> {{ $item['category']['name'] }} </td> 
                            <td> {{ $item->buying_qty }} </td> 
                            <td> {{ $item['product']['name'] }} </td> 
                            <td> <span class="btn btn-warning">Pending</span> </td>                    
                            <td>

                                <a href="{{ route('purchase.delete' ,$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
 

@endsection