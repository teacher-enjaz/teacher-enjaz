@if ($paginator->hasPages())
    <ul class="pagination d-flex justify-content-center py-3">
        @if ($paginator->onFirstPage())
            <a href="#" class="pagination-number mx-1">
                <span aria-hidden="true">&laquo;</span>
            </a>
        @else
            <a class="pagination-number mx-1" href="{{ $paginator->previousPageUrl() }}"><span aria-hidden="true">&laquo;</span></a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-number current-number mx-1">{{ $page }}</li>
                    @else
                        <a class="pagination-number mx-1" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-number mx-1">
                <span aria-hidden="true">&raquo;</span>
            </a>
        @else
            <a href="#" class="pagination-number mx-1">
                <span aria-hidden="true">&raquo;</span>
            </a>
        @endif
    </ul>
@endif
