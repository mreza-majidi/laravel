
@if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-label="@lang('pagination.previous')"
                          class="btn btn-icon btn-sm btn-dark mr-2 my-1 disabled"><i
                            class="ki ki-bold-arrow-next icon-xs"></i></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"
                       class="btn btn-icon btn-sm btn-dark mr-2 my-1"><i
                            class="ki ki-bold-arrow-next icon-xs"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <span class="btn btn-icon btn-sm btn-dark mr-2 my-1 disabled">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="btn btn-icon btn-sm border-0 btn-dark btn-hover-primary active mr-2 my-1"
                                aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a class="btn btn-icon btn-sm border-0 btn-dark mr-2 my-1"
                                   href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>

                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                       class="btn btn-icon btn-sm btn-dark mr-2 my-1"><i class="ki ki-bold-arrow-back icon-xs"></i></a>

                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-label="@lang('pagination.next')"
                          class="btn btn-icon btn-sm btn-dark mr-2 my-1 disabled"><i
                            class="ki ki-bold-arrow-back icon-xs"></i></span>
                </li>

            @endif
        </ul>
    </div>
@endif
