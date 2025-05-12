<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('home') }}" class="block h-8 w-auto">
                        <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:ml-10 sm:flex">
                    <a
                        href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'border-indigo-500 text-gray-900' : '' }} inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 font-medium text-gray-500 transition duration-150 ease-in-out hover:border-gray-300 hover:text-gray-700 focus:border-gray-300 focus:text-gray-700 focus:outline-none"
                    >
                        Home
                    </a>

                    <a
                        href="#"
                        class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 font-medium text-gray-500 transition duration-150 ease-in-out hover:border-gray-300 hover:text-gray-700 focus:border-gray-300 focus:text-gray-700 focus:outline-none"
                    >
                        About
                    </a>

                    <a
                        href="#"
                        class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 font-medium text-gray-500 transition duration-150 ease-in-out hover:border-gray-300 hover:text-gray-700 focus:border-gray-300 focus:text-gray-700 focus:outline-none"
                    >
                        Services
                    </a>

                    <a
                        href="#"
                        class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 font-medium text-gray-500 transition duration-150 ease-in-out hover:border-gray-300 hover:text-gray-700 focus:border-gray-300 focus:text-gray-700 focus:outline-none"
                    >
                        Blog
                    </a>

                    <a
                        href="#"
                        class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm leading-5 font-medium text-gray-500 transition duration-150 ease-in-out hover:border-gray-300 hover:text-gray-700 focus:border-gray-300 focus:text-gray-700 focus:outline-none"
                    >
                        Contact
                    </a>
                </div>
            </div>

            <!-- User Dropdown (optional) -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="relative ml-3" x-data="{ open: false }">
                    <div>
                        <button
                            @click="open = !open"
                            type="button"
                            class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm leading-4 font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                            aria-expanded="false"
                        >
                            Account
                            <!-- Heroicon name: mini/chevron-down -->
                            <svg
                                class="-mr-0.5 ml-2 h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition duration-200 ease-out"
                        x-transition:enter-start="scale-95 transform opacity-0"
                        x-transition:enter-end="scale-100 transform opacity-100"
                        x-transition:leave="transition duration-75 ease-in"
                        x-transition:leave-start="scale-100 transform opacity-100"
                        x-transition:leave-end="scale-95 transform opacity-0"
                        class="ring-opacity-5 absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black focus:outline-none"
                        style="display: none"
                    >
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button
                    @click="open = !open"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path
                            :class="{'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="space-y-1 pt-2 pb-3">
            <a
                href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : '' }} block border-l-4 border-transparent py-2 pr-4 pl-3 text-base font-medium text-gray-600 transition duration-150 ease-in-out hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:text-gray-800 focus:outline-none"
            >
                Home
            </a>
            <a
                href="#"
                class="block border-l-4 border-transparent py-2 pr-4 pl-3 text-base font-medium text-gray-600 transition duration-150 ease-in-out hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:text-gray-800 focus:outline-none"
            >
                About
            </a>
            <a
                href="#"
                class="block border-l-4 border-transparent py-2 pr-4 pl-3 text-base font-medium text-gray-600 transition duration-150 ease-in-out hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:text-gray-800 focus:outline-none"
            >
                Services
            </a>
            <a
                href="#"
                class="block border-l-4 border-transparent py-2 pr-4 pl-3 text-base font-medium text-gray-600 transition duration-150 ease-in-out hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:text-gray-800 focus:outline-none"
            >
                Blog
            </a>
            <a
                href="#"
                class="block border-l-4 border-transparent py-2 pr-4 pl-3 text-base font-medium text-gray-600 transition duration-150 ease-in-out hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800 focus:border-gray-300 focus:bg-gray-50 focus:text-gray-800 focus:outline-none"
            >
                Contact
            </a>
        </div>
    </div>
</nav>
