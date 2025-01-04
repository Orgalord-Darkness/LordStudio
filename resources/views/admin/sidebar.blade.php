{{-- <div class="w-64 p-4 bg-gray-800 text-white">
    <div class="bg-gray-900 p-4">
        <h2 class="text-lg font-semibold">Sidebar</h2>
    </div>

    <div class="mt-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ url('/admin') }}" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 hover:text-white">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('/categorie') }}" class="block px-4 py-2 text-gray-200 hover:bg-gray-700 hover:text-white">
                    Categorie
                </a>
            </li>
        </ul>
    </div>
</div> --}}
<nav class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
                        Heroicon name: menu

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
                        Heroicon name: x

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <h2 class="text-lg font-semibold">Naviguer</h2>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ url('/admin') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a href="{{ url('/categorie') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Categorie</a>
                        <a href="{{ url('/serie') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Serie</a>
                        <a href="{{ url('/image') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Image</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, toggle classes based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/admin') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
            <a href="{{ url('/categorie') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Categorie</a>
            <a href="{{ url('/serie') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Serie</a>
        </div>
    </div>
</nav>
