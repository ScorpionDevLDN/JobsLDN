@if ($paginator->hasPages())
    <div class="pagination">

        @if ($paginator->onFirstPage())
            <a class="prev" id="prev">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="prev" id="prev">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <a class="jobs-page">
                    {{ $element }}
                </a>
            @endif


            @if (is_array($element))

                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="jobs-page active">
                            {{ $page }}
                        </a>
                    @else
                        <a href="{{ $url }}" class="jobs-page">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="next" id="next">
                <ion-icon name="chevron-forward-outline"></ion-icon>
            </a>
        @else
            <a class="next" id="next">
                <ion-icon name="chevron-forward-outline"></ion-icon>
            </a>
        @endif
    </div>
@endif