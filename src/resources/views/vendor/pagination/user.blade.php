
<link rel="stylesheet" href="admin.css">

<div class="pagination-group">
    <ul class="pagination">
        {{-- ＜ --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&lt;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a></li>
        @endif

        {{-- 1ページ目のリンク --}}
        @if ($paginator->currentPage() > 3)
            <li><a href="{{ $paginator->url(1) }}">1</a></li>
            <li class="disabled" aria-disabled="true"><span>…</span></li>
        @endif

        {{-- 中間ページへのリンク --}}
        @foreach ($elements as $element)
            {{-- 省略 --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- 数字のリンク --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @elseif ($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() + 1)
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- 最終ページのリンク --}}
        @if ($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="disabled" aria-disabled="true"><span>…</span></li>
            <li><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- ＞ --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a></li>
        @else
            <li class="disabled"><span>&gt;</span></li>
        @endif
    </ul>
</div>
