<footer class="section-sm bg-tertiary">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-2 col-md-4 col-6 mb-4">
				<div class="footer-widget">
					<h5 class="mb-4 text-primary font-secondary">Service Info</h5>
					<ul class="list-unstyled">

                        @php
                            $item = App\Models\Service::where('status', 1)->orderBy('title','ASC')->get();
                        @endphp
                         @if ($item->isNotEmpty())

                         @foreach ($item as $item )

						<li class="mb-2"><a href="{{ route('service.details', ['id' => $item->id, 'slug' => $item->title_slug]) }}">{{ $item->title }}</a>
						</li>


                        @endforeach
                        @endif

					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-6 mb-4">
				<div class="footer-widget">
					<h5 class="mb-4 text-primary font-secondary">Portfolio Info</h5>
					<ul class="list-unstyled">



						@php
                            $item = App\Models\Portfoliocategory::where('status', 1)->orderBy('category_name','ASC')->get();
                        @endphp
                         @if ($item->isNotEmpty())

                         @foreach ($item as $item )

						<li class="mb-2"><a href="{{ url('portfolios/categoty/' . $item->id . '/' . $item->category_slug) }}">{{ $item->category_name }}</a>
						</li>


                        @endforeach
                        @endif
					</ul>
				</div>
			</div>
      <div class="col-lg-2 col-md-4 col-6 mb-4">
				<div class="footer-widget">
					<h5 class="mb-4 text-primary font-secondary">Blog Info</h5>
					<ul class="list-unstyled">
						@php
                            $item = App\Models\Blogcatetory::where('status', 1)->orderBy('category_name','ASC')->get();
                        @endphp
                         @if ($item->isNotEmpty())

                         @foreach ($item as $item )

						<li class="mb-2"><a href="{{ url('categoty/' . $item->id . '/' . $item->category_slug) }}">{{ $item->category_name }}</a>
						</li>


                        @endforeach
                        @endif
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-4 col-6 mb-4">
				<div class="footer-widget">
					<h5 class="mb-4 text-primary font-secondary">Other Info</h5>
					<ul class="list-unstyled">


                        @php
                            $pages = App\Models\Page::where('status', 1)->orderBy('title','ASC')->get();
                        @endphp
                    @if ($pages->isNotEmpty())

                       @foreach ($pages as $item )


						<li class="mb-2"><a href="{{ url('datails/'.$item->id. '/'.$item->title_slug ) }}">{{ $item->title }}</a>
						</li>

                        @endforeach
                        @endif
					</ul>
				</div>
			</div>


		<div class="row align-items-center mt-5 text-center text-md-start">
			<div class="col-lg-4">
        <a href="index.html">
          <img loading="prelaod" decoding="async" class="img-fluid" width="160" src="images/logo.png" alt="Wallet">
        </a>
			</div>
			<div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
				<ul class="list-unstyled list-inline mb-0 text-lg-center">
					<li class="list-inline-item me-4"><a class="text-black" href=""></a>
					</li>
					<li class="list-inline-item me-4"><a class="text-black" href=""></a>
					</li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-6 text-md-end mt-4 mt-md-0">
				<ul class="list-unstyled list-inline mb-0 social-icons">
					<li class="list-inline-item me-3"><a title="Explorer Facebook Profile" class="text-black" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
					</li>
					<li class="list-inline-item me-3"><a title="Explorer Twitter Profile" class="text-black" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
					</li>
					<li class="list-inline-item me-3"><a title="Explorer Instagram Profile" class="text-black" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
