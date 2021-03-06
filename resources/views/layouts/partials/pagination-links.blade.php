<nav>
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" wire:loading.class="bg-lighter" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item" wire:loading.class="disabled">
                <a class="page-link"
                   wire:loading.class="bg-lighter"
                   wire:click.prevent="previousPage"
                   href="{{ $paginator->previousPageUrl() }}"
                   rel="prev"
                   aria-label="@lang('pagination.previous')"
                >&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" wire:loading.class="bg-lighter">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" wire:loading.class="disabled" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item" wire:loading.class="disabled">
                            <a class="page-link"
                               wire:click.prevent="gotoPage({{ $page }})"
                               wire:loading.class="bg-lighter"
                               href="{{ $url }}"
                            >
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item" wire:loading.class="disabled">
                <a class="page-link"
                   wire:click.prevent="nextPage"
                   wire:loading.class="bg-lighter"
                   href="{{ $paginator->nextPageUrl() }}"
                   rel="next"
                   aria-label="@lang('pagination.next')"
                >&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true" wire:loading.class="bg-lighter">&rsaquo;</span>
            </li>
        @endif
    </ul>
</nav>
