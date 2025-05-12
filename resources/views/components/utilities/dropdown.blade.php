<div class="flex justify-center">
    <div
        x-data="DropDown"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']"
        class="relative"
    >
        <!-- Button -->
        <button
            x-ref="button"
            x-on:click="toggle()"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            {{ $attributes->class(['relative flex items-center justify-center gap-2 whitespace-nowrap ']) }}
        >
            <span>
                {{ $trigger }}
            </span>

            <!-- Heroicon: micro chevron-down -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path
                    fill-rule="evenodd"
                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd"
                />
            </svg>
        </button>

        <!-- Panel -->
        <div
            x-ref="panel"
            x-show="open"
            x-transition.origin.top.left
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            x-cloak
            class="absolute left-0 z-10 mt-2 min-w-48 origin-top-left rounded-lg border border-gray-200 bg-white p-1.5 shadow-xs outline-hidden"
        >
            {{ $slot }}
        </div>
    </div>
</div>
