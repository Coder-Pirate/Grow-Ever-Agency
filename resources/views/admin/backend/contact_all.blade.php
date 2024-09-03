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
                        <li class="breadcrumb-item active" aria-current="page">All Contact</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    {{-- <a href="{{ route('admin.blog.add') }}" class="btn btn-primary px-5">Add Blog </a> --}}
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Services Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $key => $item)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td> {{ $item->name }}</td>
                                    <td> {{ $item['category']['title'] }}</td>
                                    <td> {{ $item->phone }}</td>
                                    <td> {{ $item->email }}</td>


                                    <td>
                                        @if ($item->status >= 1)
                                            <span class="badge bg-success">Read</span>
                                        @else
                                            <span class="badge bg-danger">Unread</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('contact.info', $item->id) }}" class="btn btn-success px-2"><i
                                                class="lni lni-eye"></i> </a>
                                        <a href="{{ route('contact.edit', $item->id ) }}" class="btn btn-info px-2"><i
                                                class="fadeIn animated bx bx-edit"></i></i></a>
                                        <a href="{{ route('contact.delete', $item->id ) }}" class="btn btn-danger px-2" id="delete"><i
                                                class="bx bxs-trash"></i></i> </a>
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
