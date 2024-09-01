@extends('frontend.master')
@section('master')
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5">
                        <h2 class="mb-4" style="line-height:1.5">{{ $portfolio->title }}</h2>
                        <span>{{ \Carbon\Carbon::parse($portfolio->created_at)->format('d M, Y') }}<span class="mx-2">/</span>
                        </span>
                        <p class="list-inline-item">Category : <a href="#!"
                                class="ml-1">{{ $portfolio['category']['category_name'] }} </a>
                        </p>
                        <p class="list-inline-item">Author : <a href="#!" class="ml-1">{{ $portfolio['author']['name'] }}
                            </a>
                        </p>
                    </div>
                    <div class="mb-5 text-center">
                        <div class="post-slider rounded overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{ asset($portfolio->image) }}" alt="Post Thumbnail">

                        </div>
                    </div>
                    <div class="content">


                        {!! $portfolio->contant !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
