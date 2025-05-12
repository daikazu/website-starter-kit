@unless ($breadcrumbs->isEmpty())
    <nav aria-label="Breadcrumbs">
        <ul class="flex flex-wrap items-center p-0 list-none text-sm font-bold text-neutral-800 dark:text-neutral-300 gap-1">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && ! $loop->last)
                    <li>
                        <a
                            href="{{ $breadcrumb->url }}"
                            class="text-accent-600 hover:text-accent-900 hover:underline focus:text-accent-900 focus:underline flex gap-1 items-center"
                        >
                            @if($loop->first)
                                <x-heroicon-o-home class="size-4" />
                            @endif

                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless ($loop->last)
                    <li class="text-neutral-500">/</li>
                @endif
            @endforeach
        </ul>
    </nav>
@endunless
