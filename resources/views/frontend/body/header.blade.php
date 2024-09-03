
@php
$siteinfo = App\Models\Siteinfo::find(1);
@endphp






<header class="navigation bg-tertiary">





    <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img loading="prelaod" decoding="async" class="img-fluid" width="160" src="{{ asset($siteinfo->logo) }}"
                    alt="Wallet">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item "> <a class="nav-link" href="{{ route('home.about') }}">About</a>
                    </li>

                    <li class="nav-item "> <a class="nav-link" href="{{ route('home.servce') }}">Services</a>
                    </li>
                    <li class="nav-item "> <a class="nav-link" href="{{ route('home.portfolio') }}">Portfilio</a>
                    </li>

                    <li class="nav-item "> <a class="nav-link" href="{{ route('home.blog') }}">Blog</a>
                    </li>

                    <li class="nav-item "> <a class="nav-link" href="{{ route('home.faq') }}">Faq</a>
                    </li>

                    <li class="nav-item "> <a class="nav-link" href="{{ route('home.contact') }}">Contact</a>
                    </li>

                </ul>
                {{-- <!-- account btn --> <a href="#!" class="btn btn-outline-primary">Log In</a> --}}
                <!-- account btn --> <a href="{{ route('home.contact') }}" class="btn btn-primary ms-2 ms-lg-3">Contact
                    Us</a>
            </div>
        </div>
    </nav>
</header>
