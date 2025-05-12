@props(["title" => "Slide Over Title"])
<div
    x-data="SlideOver"
    x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
    x-id="['slide-over-button']"
    class="relative z-50 h-auto w-auto"
>
    <button
        x-ref="button"
        x-on:click="toggle()"
        :aria-expanded="open"
        :aria-controls="$id('slide-over-button')"
        class="inline-flex h-10 items-center justify-center rounded-md bg-white/10 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-neutral-100 hover:text-gray-900 focus:bg-white focus:outline-hidden focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 active:bg-white disabled:pointer-events-none disabled:opacity-50"
    >
        <x-heroicon-o-bars-3 class="h-6 w-6 fill-current" aria-hidden="true" />
        <span class="sr-only">Open</span>
    </button>
    <template x-teleport="body">
        <div x-show="open" class="relative z-99">
            <div
                x-show="open"
                x-on:keydown.window.escape="close($refs.button)"
                x-transition.opacity.duration.600ms
                x-on:click="close($refs.button)"
                class="fixed inset-0 bg-black bg-opacity-50"
            ></div>
            <div class="fixed inset-0 overflow-clip">
                <div class="absolute inset-0 overflow-clip">
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-trap.noscroll.inert="open"
                            :id="$id('slide-over-button')"
                            x-on:click.away="close($refs.button)"
                            x-transition:enter="transform transition duration-500 ease-in-out sm:duration-700"
                            x-transition:enter-start="translate-x-full"
                            x-transition:enter-end="translate-x-0"
                            x-transition:leave="transform transition duration-500 ease-in-out sm:duration-700"
                            x-transition:leave-start="translate-x-0"
                            x-transition:leave-end="translate-x-full"
                            @class(["w-screen", "max-w-md" => ! $attributes->has("full"), "max-w-full" => $attributes->has("full")])
                        >
                            <div
                                class="flex h-full flex-col overflow-y-scroll border-l border-neutral-100/70 bg-white py-5 shadow-lg"
                            >
                                <div class="px-4 sm:px-5">
                                    <div class="flex items-start justify-between pb-1">
                                        <h2
                                            class="text-base font-semibold leading-6 text-gray-900"
                                            id="slide-over-title"
                                        >
                                            {{ $title }}
                                        </h2>
                                        <div class="ml-3 flex h-auto items-center">
                                            <button
                                                x-on:click="close($refs.button)"
                                                class="absolute right-0 top-0 z-30 mr-5 mt-4 flex items-center justify-center space-x-1 rounded-md border border-neutral-200 px-3 py-2 text-xs font-medium uppercase text-neutral-600 hover:bg-neutral-100"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="h-4 w-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"
                                                    ></path>
                                                </svg>
                                                <span>Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative mt-5 flex-1 px-4 sm:px-5">
                                    <div class="absolute inset-0 px-4 sm:px-5">
                                        <div
                                            class="relative h-full overflow-clip rounded-md border border-dashed border-neutral-300"
                                        >
                                            {{ $slot }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>

@pushonce("scripts")
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('SlideOver', () => ({
                open: false,
                toggle() {
                    if (this.open) {
                        return this.close();
                    }

                    this.$refs.button.focus();

                    this.open = true;
                },
                close(focusAfter) {
                    if (!this.open) return;

                    this.open = false;

                    focusAfter && focusAfter.focus();
                },
            }));
        });
    </script>
@endpushonce
