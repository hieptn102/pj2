@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Thêm mới sản phẩm </h4><br><br>

            <form method="post" action="{{ route('product.store') }}" id="myForm">
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10 form-group">
                    <input name="name" class="form-control" type="text">
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label  for="example-text-input" class="col-sm-2 col-form-label">Nhà cung cấp</label>
                <div class="col-sm-10 form-group">
                    <select name="supplier_id" class="form-select" aria-label="Default select example">
                        <option selected="">Open this select menu</option>
                        @foreach ($supplier as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option> 
                        @endforeach
                        
                        </select>
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label  for="example-text-input" class="col-sm-2 col-form-label">Đơn vị</label>
                <div class="col-sm-10 form-group">
                    <select name="unit_id" class="form-select" aria-label="Default select example">
                        <option selected="">Open this select menu</option>
                        @foreach ($unit as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option> 
                        @endforeach
                        
                        </select>
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Danh mục</label>
                <div class="col-sm-10 form-group">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected="">Open this select menu</option>
                        @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option> 
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light" value="Thêm sản phẩm">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 

            },
            messages :{
                name: {
                    required : 'Vui lòng nhập tên sản phẩm',
                },

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
 
@endsection 
