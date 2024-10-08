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
                    <li class="breadcrumb-item active" aria-current="page">All Team Membar</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="ms-auto">
                <div class="btn-group">
               <a href="{{ route('team.add') }}" class="btn btn-primary px-5">Add Membar </a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th> Image </th>
                            <th>Nmae</th>
                            <th>Degination</th>
                            <th>Staus</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team as $key=> $item)
                        <tr>

                            <td>{{ $key+1 }}</td>
                            <td> <img src="{{ asset($item->image) }}" alt="" style="width: 70px; height:70px;"></td>
                            <td> {{ $item->name }}</td>
                            <td> {{ $item->designation }}</td>

                            <td>
                                @if ($item->status>= 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                                   </td>
                            <td>
       <a href="{{ route('team.edit', $item->id) }}" class="btn btn-info px-5">Edit </a>
       <a href="{{ route('team.delete',$item->id ) }}" class="btn btn-danger px-5" id="delete">Delete </a>
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
