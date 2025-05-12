@seoTitle('Laravel Starter Kit')
@seoDescription('A modern Laravel starter kit for quickly building professional websites and applications.')
@seoImage(asset(config('app.default_social_image')))
@seoRobots('index,follow')

<x-layouts.default>
    <x-slot:main>
        <!-- Hero Section -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-neutral-900 via-neutral-700 to-neutral-900 py-24 text-white"
        >
            <div class="relative container mx-auto px-4">
                <div class="mx-auto max-w-4xl text-center">
                    <div class="mb-6">
                        <span
                            class="inline-block rounded-full bg-neutral-500/10 px-4 py-1.5 text-sm font-medium text-neutral-300 backdrop-blur-sm"
                        >
                            Laravel Starter Kit
                        </span>
                    </div>

                    <h1
                        class="mb-6 bg-gradient-to-r from-white to-neutral-200 bg-clip-text text-4xl font-bold tracking-tight text-transparent md:text-6xl lg:text-7xl"
                    >
                        Base Template
                    </h1>

                    <p class="mb-10 text-lg text-gray-300 md:text-xl">
                        A powerful Laravel starter kit with essential packages and configurations to jumpstart your web
                        projects.
                    </p>

                    <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                        <a
                            href="#getting-started"
                            class="group relative inline-flex items-center justify-center overflow-hidden rounded-lg bg-gradient-to-r from-neutral-500 to-neutral-600 px-8 py-3 font-semibold text-white transition-all duration-300 hover:from-neutral-600 hover:to-neutral-700 focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 focus:outline-none"
                        >
                            <span class="relative">Installation Guide</span>
                        </a>
                        <a
                            href="#features"
                            class="group relative inline-flex items-center justify-center overflow-hidden rounded-lg border border-gray-600 bg-transparent px-8 py-3 font-semibold text-white transition-all duration-300 hover:border-neutral-500 hover:text-neutral-500 focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2 focus:outline-none"
                        >
                            <span class="relative">View Features</span>
                        </a>
                    </div>

                    <!-- Trust Indicators -->
                    <div
                        class="mt-16 flex flex-wrap items-center justify-center gap-8 text-sm text-gray-400"
                        x-show="isVisible"
                        x-transition:enter="transition delay-500 duration-1000 ease-out"
                        x-transition:enter-start="translate-y-4 transform opacity-0"
                        x-transition:enter-end="translate-y-0 transform opacity-100"
                    >
                        <div class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                            <span>Modern Laravel v12</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                            <span>TailwindCSS Included</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-neutral-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"
                                ></path>
                            </svg>
                            <span>Ready-to-Use Components</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <x-utilities.tailwindcss-typology />
    </x-slot>
</x-layouts.default>
