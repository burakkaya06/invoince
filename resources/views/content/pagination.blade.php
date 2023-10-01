<!-- resources/views/vendor/pagination/custom.blade.php -->

<div class="pagination">
    {{-- Örneğin, önceki sayfa linki --}}
    @if ($paginator->onFirstPage())
        <span class="disabled">&lsaquo; Önceki</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo; Önceki</a>
    @endif

    {{-- Sayfa numaraları --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="dots">{{ $element }}</span>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Sonraki sayfa linki --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next">Sonraki &rsaquo;</a>
    @else
        <span class="disabled">Sonraki &rsaquo;</span>
    @endif
</div>
