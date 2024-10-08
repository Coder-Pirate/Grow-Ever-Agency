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
                    <li class="breadcrumb-item active" aria-current="page">All About Page Info</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th> Sub Title </th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($about as $key=> $about)
                        <tr>

                            <td>{{ $key+1 }}</td>
                            <td>{{ $about->sub_title }}</td>
                            <td>{{ $about->title }}</td>
                            <td>
       <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-info px-5">Edit </a>
       {{-- <a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger px-5" id="delete">Delete </a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>




</div>


@endsection
