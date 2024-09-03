@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <div class="col">

                <div class="col">
                    <div class="card">
                        <div class="row g-0">

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><span style="color: red">Name:</span> {{ $contatInfo->name }}</h5>
                                    <h6 class="card-title"><span style="color: red">Service name:</span> {{ $contatInfo['category']['title'] }}</h6>
                                    <h6 class="card-title"><span style="color: red">Phone Number:</span>{{ $contatInfo->phone }}</h6>
                                    <h6 class="card-title"><span style="color: red">Email Address:</span> {{ $contatInfo->email }}</h6>
                                    <p class="card-text"><span style="color: red">Massages:</span> {!!  $contatInfo->massage !!}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </div>
@endsection
