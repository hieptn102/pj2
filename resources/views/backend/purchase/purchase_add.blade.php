@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Thêm mới đơn hàng </h4><br><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="md-3">
                            <label for="example-text-input" class="col-sm-2 col-form-lable">Date</label>
                            <input class="form-control example-date-input" type="date" name="date" id="date">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="md-3">
                            <label for="example-text-input" class="col-sm-2 col-form-lable">Mã đơn hàng</label>
                            <input class="form-control example-date-input" type="text" name="purchase_no" id="purchase_no">
                    </div>
                </div>
                
                <div class="col-md-4"> 
                    <div class="md-3">
                        <label  for="example-text-input" class="form-label">Nhà cung cấp</label>
                        <div class="col-sm-10 form-group">
                            <select name="supplier_id" id="supplier_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach ($supplier as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option> 
                                @endforeach
                                
                                </select>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
            <br>
            <div class="row">
                

                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label">Danh mục</label>
                        <div class="col-sm-10 form-group">
                            <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option> 
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="md-3">
                        <label  for="example-text-input" class="form-label">Sản phẩm</label>
                        <div class="col-sm-10 form-group">
                            <select id="product_id" name="product_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach ($product as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option> 
                                @endforeach
                                
                                </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="md-3">
                        <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>


        <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore"> Thêm </i>
                    </div>
                </div>

            </div> <!-- end row -->
        </div>
        <div class="card-body">
            <form method="" action="">
                @csrf
                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                    <thead>
                        <tr>
                            <th>Danh mục</th>
                            <th>Tên sản phẩm </th>
                            <th>PSC/KG</th>
                            <th>Đơn vị giá </th>
                            <th>Mô tả</th>
                            <th>Tổng giá</th>
                            <th>Action</th> 
    
                        </tr>
                    </thead>
    
                    <tbody id="addRow" class="addRow">
    
                    </tbody>
    
                    <tbody>
                        <tr>
                            <td colspan="5"></td>
                            <td>
                                <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;" >
                            </td>
                            <td></td>
                        </tr>
    
                    </tbody>                
                </table><br>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" id="storeButton">Thêm đơn hàng</button>
    
                </div>
    
            </form>
        </div>
    </div>
    
</div> <!-- end col -->
</div>
 

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".addeventmore", function(){
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id  = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(purchase_no == ''){
                $.notify("Purchase No is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(supplier_id == ''){
                $.notify("Supplier is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(category_id == ''){
                $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(product_id == ''){
                $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                 var source = $("document-template").html();
                 var tamplate = Handlebars.compile(source);
        })
    })
</script>

<script id="document-template" type="text/x-handlebars-template">

    <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]" value="@{{date}}">
            <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
            <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
    
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
    
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
    
        <td>
            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value=""> 
        </td>
    
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
        </td>
    
        <td>
            <input type="text" class="form-control" name="description[]"> 
        </td>
    
        <td>
            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly> 
        </td>
    
        <td>
            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
        </td>
    
    </tr>
    
</script>
    


<script type="text/javascript">
    $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{ route('get-category') }}",
                type: "GET",
                data:{supplier_id:supplier_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.category_id+' "> '+v.category.name+'</option>';
                    });
                    $('#category_id').html(html);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
                type: "GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.name+'</option>';
                    });
                    $('#product_id').html(html);
                }
            })
        });
    });
</script>

</div>
</div>

 
@endsection 
