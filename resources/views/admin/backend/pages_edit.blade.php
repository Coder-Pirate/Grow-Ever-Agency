@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Page Info</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Page</h5>

                <form id="myForm" action="{{ route('update.pages') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $pages->id }}">

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Name</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $pages->title }}">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label"> Contant </label>
                        <textarea name="description" class="form-control" id="editor" placeholder="" rows="3">{{ $pages->description }}</textarea>
                    </div>

                    <div class="form-group col-md-6">
                <label for="input1" class="form-label" >Status </label>
                <select name="status" class="form-select mb-3" aria-label="Default select example" required="">
               <option  disabled required=""></option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>


                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>

    {{-- //// Start Main Course Image Update /// --}}


    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                title: {
                    required : true,
                },


            },
            messages :{
                title: {
                    required : 'Please Enter  Name',
                }


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
