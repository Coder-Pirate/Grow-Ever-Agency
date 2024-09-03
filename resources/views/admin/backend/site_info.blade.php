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
<!-- Fabincon -->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Fabicon</h5>

                <form id="myForm" action="{{ route('admin.siteicon.update') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $siteinfo->id }}">
                    <input type="hidden" name="old_icon" value="{{ $siteinfo->fabicon }}">

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> site icon</label>
                        <input type="file" name="image" class="form-control" id="image" >
                    </div>

                    <div class="form-group col-md-6">
                        <img id="showImage" src="{{ asset($siteinfo->fabicon) }}" alt="" class="img-thumbnail p-1 bg-primary" width="100">
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

<!---Logo----->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Site Logo</h5>

                <form id="myForm" action="{{ route('admin.sitelogo.update') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $siteinfo->id }}">
                    <input type="hidden" name="old_logo" value="{{ $siteinfo->logo }}">
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> site logo</label>
                        <input type="file" name="image" class="form-control" id="image1" >
                    </div>

                    <div class="form-group col-md-6">
                        <img id="showImage1" src="{{ asset($siteinfo->logo) }}" alt="" class="img-thumbnail p-1 bg-primary" width="100" height="68">
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Blog</h5>

                <form id="myForm" action="{{ route('admin.siteothersinfo.update') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $siteinfo->id  }}">

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Site Name</label>
                        <input type="text" name="site_name" class="form-control" id="site_name" value="{{ $siteinfo->site_name  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" id="contact_number" value="{{ $siteinfo->contact_number  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Working Days</label>
                        <input type="text" name="working_days" class="form-control" id="working_days" value="{{ $siteinfo->working_days  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Working Hours</label>
                        <input type="text" name="working_hours" class="form-control" id="working_hours" value="{{ $siteinfo->working_hours  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Branch Name</label>
                        <input type="text" name="branch_name" class="form-control" id="branch_name" value="{{ $siteinfo->branch_name  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Branch Address</label>
                        <input type="text" name="branch_address" class="form-control" id="branch_address" value="{{ $siteinfo->branch_address  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Facebook Url</label>
                        <input type="text" name="fb_url" class="form-control" id="tfb_urltle" value="{{ $siteinfo->fb_url  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Twitter Url</label>
                        <input type="text" name="tw_url" class="form-control" id="tw_url" value="{{ $siteinfo->tw_url  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> What's App Url</label>
                        <input type="text" name="wh_url" class="form-control" id="wh_url" value="{{ $siteinfo->wh_url  }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Instagram Url</label>
                        <input type="text" name="in_url" class="form-control" id="in_url" value="{{ $siteinfo->in_url  }}">
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
    $(document).ready(function(){
        $('#image1').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage1').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                },


            },
            messages :{
                category_name: {
                    required : 'Please Enter SubCategory Name',
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
