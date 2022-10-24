@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Cập nhật thông tin nhà cung cấp </h4><br><br>

            <form method="post" action="{{ route('supplier.update') }}" id="myForm">
                @csrf
            <input type="hidden" name="id" value="{{$supplier->id}}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Tên nhà cung cấp</label>
                <div class="col-sm-10 form-group">
                    <input name="name" class="form-control" value="{{$supplier->name}}" type="text">
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10 form-group">
                <input name="mobiile_no" class="form-control" value="{{$supplier->mobiile_no}}" type="text">
                </div>
            </div>
            <!-- end row -->



            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10 form-group">
                    <input name="email" class="form-control" value="{{$supplier->email}}" type="email">
                </div>
            </div>
            <!-- end row -->

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10 form-group">
                    <input name="adderss" class="form-control" value="{{$supplier->adderss}}" type="text">
                </div>
            </div>
            <!-- end row -->

            <input type="submit" class="btn btn-info waves-effect waves-light" value="Cập nhật">
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
                mobiile_no: {
                    required : true,
                }, 
                email: {
                    required : true,
                }, 
                adderss: {
                    required : true,
                }, 
            },
            messages :{
                name: {
                    required : 'Vui lòng nhập tên nhà cung cấp',
                },
                mobiile_no: {
                    required : 'Vui lòng nhập số điện thoại',
                },
                email: {
                    required : 'Vui lòng nhập email',
                },
                adderss: {
                    required : 'Vui lòng nhập địa chỉ',
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
