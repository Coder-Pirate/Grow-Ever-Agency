@extends('frontend.master')
@section('master')

@php
$siteinfo = App\Models\Siteinfo::find(1);
@endphp


    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5">
                        <h2 class="mb-4" style="line-height:1.5">{{ $blog->title }}</h2>
                        <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}<span class="mx-2">/</span>
                        </span>
                        <p class="list-inline-item">Category : <a href="#!"
                                class="ml-1">{{ $blog['category']['category_name'] }} </a>
                        </p>
                        <p class="list-inline-item">Author : <a href="#!" class="ml-1">{{ $blog['author']['name'] }}
                            </a>
                        </p>
                    </div>
                    <div class="mb-5 text-center">
                        <div class="post-slider rounded overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{ asset($blog->image) }}" alt="Post Thumbnail">

                        </div>
                    </div>
                    <div class="content">


                        {!! $blog->contant !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
