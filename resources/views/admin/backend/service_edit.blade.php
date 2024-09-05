@extends('admin.admin_dashboard')

@section('admin')
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
                <h5 class="mb-4">Edit Info</h5>

                <form id="myForm" action="{{ route('admin.service.update') }}" method="post" class="row g-3"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $id->id }}">
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Name</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $id->title }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Icon Class </label>
                        <input type="text" name="icon_class" class="form-control" id="icon_class" value="{{ $id->icon_class }}">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label">Shot Description </label>
                        <textarea name="short_desc" class="form-control" id="short_desc" placeholder="{{ $id->short_desc }}" rows="3">{{ $id->short_desc }}</textarea>
                    </div>

                    

                    <label for="input1" class="form-label"> Description </label>
                    <div id="editor-container">{!! $id->description !!} </div>
                    <textarea name="description" class="form-control" id="content" style="display:none;"></textarea>


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
                            <button type="submit" id="submit-button" class="btn btn-primary px-4">Save Changes</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>











    </div>

    {{-- //// Start Main Course Image Update /// --}}
@endsection
