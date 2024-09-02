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
                    <li class="breadcrumb-item active" aria-current="page">Edit About Info</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Info</h5>

            <form id="myForm" action="{{ route('update.about') }}" method="post" class="row g-3" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $about->id }}">
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label"> Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{ $about->sub_title }}" >
                </div>

                <div class="form-group col-md-6">
                    <label for="input1" class="form-label"> Title </label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $about->title }}" >
                </div>


            <div class="form-group col-md-12">
                <label for="input1" class="form-label">Description </label>
                <textarea name="description" class="form-control" id="editor" placeholder="" rows="3">{{ $about->description }}</textarea>
            </div>


                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
          <button type="submit" class="btn btn-primary px-4">Save Changes</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('about.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="id" value="{{ $about->id }}">
                <input type="hidden" name="old_img" value="{{ $about->image }}">



                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="input2" class="form-label"> Image </label>
                        <input class="form-control"  required="" name="image" type="file" id="image" value="">
                    </div>

                    <div class="col-md-6">
                        <img id="showImage" src="{{ asset($about->image) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="100">
                    </div>

                </div>

                <br><br>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
          <button type="submit" class="btn btn-primary px-4">Save Changes</button>





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





@endsection
