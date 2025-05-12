@props(['main' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        @stack('prefetch')
        {{ seo()->render() }}
        <x-layouts.common.tracking />
        @googlefonts()
        @livewireStyles()
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
        @stack('head')
    </head>

    <body
        @class([
            'grid min-h-dvh grid-cols-1 grid-rows-[auto_1fr_auto]',
            'bg-neutral-100 text-neutral-800 antialiased ',
            'debug-screens' => config('app.debug'),
        ])
    >
        @stack('body')
        <x-layouts.common.no-script />
        <x-layouts.common.skip-to-content />
        <x-welcome-bar />
        <x-layouts.default.header />

        @if ($main instanceof \Illuminate\View\ComponentSlot)
            <main id="content" {{ $main->attributes->class([]) }}>
                {{ $main }}
            </main>
        @endif

        {{ $slot }}
        <x-layouts.default.footer />
        @livewireScripts()
        @stack('scripts')
    </body>
</html>
