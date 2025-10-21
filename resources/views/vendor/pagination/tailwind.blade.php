@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
    <div class="flex justify-between flex-1 sm:hidden">
        @if ($paginator->onFirstPage())
        <span
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-zinc-800 border border-zinc-700 cursor-default leading-5 rounded-md dark:text-gray-500 dark:bg-zinc-800 dark:border-zinc-700">
            {!! __('pagination.previous') !!}
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-zinc-800 border border-zinc-700 leading-5 rounded-md hover:bg-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300 dark:hover:bg-zinc-700">
            {!! __('pagination.previous') !!}
        </a>
        @endif

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-300 bg-zinc-800 border border-zinc-700 leading-5 rounded-md hover:bg-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300 dark:hover:bg-zinc-700">
            {!! __('pagination.next') !!}
        </a>
        @else
        <span
            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-zinc-800 border border-zinc-700 cursor-default leading-5 rounded-md dark:text-gray-500 dark:bg-zinc-800 dark:border-zinc-700">
            {!! __('pagination.next') !!}
        </span>
        @endif
    </div>

    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-400 leading-5 dark:text-gray-400">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                <span class="font-medium text-gray-200 dark:text-gray-200">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium text-gray-200 dark:text-gray-200">{{ $paginator->lastItem() }}</span>
                @else
                {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium text-gray-200 dark:text-gray-200">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
        <div>
            <span class="relative z-0 inline-flex rtl:flex-row-reverse rounded-md">
                @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span
                        class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-zinc-800 border border-zinc-700 cursor-default rounded-l-md leading-5 dark:bg-zinc-800 dark:border-zinc-700"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400 bg-zinc-800 border border-zinc-700 rounded-l-md leading-5 hover:bg-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-400 dark:hover:bg-zinc-700"
                    aria-label="{{ __('pagination.previous') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                @endif
                @foreach ($elements as $element)
                @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-zinc-800 border border-zinc-700 cursor-default leading-5 dark:bg-zinc-800 dark:border-zinc-700">{{
                        $element }}</span>
                </span>
                @endif
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span
                        class="relative z-10 inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-green-600 border border-green-500 cursor-default leading-5 dark:bg-green-600 dark:text-white dark:border-green-500">{{
                        $page }}</span>
                </span>
                @else
                <a href="{{ $url }}"
                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-300 bg-zinc-800 border border-zinc-700 leading-5 hover:bg-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-300 dark:hover:bg-zinc-700"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-400 bg-zinc-800 border border-zinc-700 rounded-r-md leading-5 hover:bg-zinc-700 transition ease-in-out duration-150 dark:bg-zinc-800 dark:border-zinc-700 dark:text-gray-400 dark:hover:bg-zinc-700"
                    aria-label="{{ __('pagination.next') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span
                        class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-zinc-800 border border-zinc-700 cursor-default rounded-r-md leading-5 dark:bg-zinc-800 dark:border-zinc-700"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif