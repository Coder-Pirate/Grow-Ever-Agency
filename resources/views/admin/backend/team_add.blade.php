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
                        <li class="breadcrumb-item active" aria-current="page">Edit Home Info</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Add  Member</h5>

                <form id="myForm" action="{{ route('store.team') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Designation</label>
                        <input type="text" name="designation" class="form-control" id="designation" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Image</label>
                        <input type="file" name="image" class="form-control" id="image" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <img id="showImage" src="{{ (!empty($team->image)) ? url('upload/teamimage/'.$team->image) : url('upload/no_image.jpg')}}" alt="" class="rounded-circle p-1 bg-primary" width="80">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Facebook Url</label>
                        <input type="text" name="fb_url" class="form-control" id="fb_url" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Twitter Url</label>
                        <input type="text" name="tw_url" class="form-control" id="tw_url" value="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Instagram Url</label>
                        <input type="text" name="in_url" class="form-control" id="in_url" value="">
                    </div>


                    {{-- <div class="form-group col-md-6">
                <label for="input1" class="form-label">Status </label>
                <select name="status" class="form-select mb-3" aria-label="Default select example">
               <option selected="" disabled>Open this select menu</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div> --}}


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
                name: {
                    required : true,
                },
                designation: {
                    required : true,
                },
                image: {
                    required : true,
                },

            },
            messages :{
                name: {
                    required : 'Please Enter SubCategory Name',
                },
                designation: {
                    required : 'Please Enter SubCategory Name',
                },
                image: {
                    required : 'Please Select Category Name',
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
