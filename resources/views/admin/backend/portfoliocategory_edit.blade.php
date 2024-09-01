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
                        <li class="breadcrumb-item active" aria-current="page">Edit Portfolio Category </li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Portfolio Category</h5>

                <form id="myForm" action="{{ route('blog.portfoilo.update') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $id->id }}">
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Category Name</label>
                        <input type="text" name="category_name" required="" class="form-control" id="category_name"
                            value="{{ $id->category_name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Status </label>
                        <select name="status" class="form-select mb-3" aria-label="Default select example" required="">
                            <option disabled required=""></option>
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
@endsection
