

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"></span>
                </li>
            @else
                <li class="page-item" >
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item active" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><a href="" class="page-link">
                                {{ $page }}
                            </a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"></span>
                </li>
            @endif
        </ul>
    </nav>
@endif



{{-- <nav class="mb-md-50">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item active "> <a href="blog.html" class="page-link">
                                                    1
                                                </a>
                                            </li>
                                            <li class="page-item"> <a href="blog.html" class="page-link">
                                                    2
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="blog.html" aria-label="Pagination Arrow"> <i
                                                        class="fas fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav> --}}
