<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Tailwind CSS</title>
    {{-- @vite('resources/css/app.css') <!-- Assurez-vous d'inclure le fichier CSS compilé --> --}}
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <!-- Logo -->
                    <div>
                        <a href="#" class="flex items-center py-5 px-2 text-gray-700">
                            <svg class="h-6 w-6 mr-1 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-2.21 0-4 .895-4 2v2h8v-2c0-1.105-1.79-2-4-2zM12 13a2 2 0 100-4 2 2 0 000 4zM12 2a10 10 0 00-9 5.73 6.5 6.5 0 015.98 1.89 8.001 8.001 0 016.04-3.53A10 10 0 0012 2z" />
                            </svg>
                            <span class="font-bold">MyWebsite</span>
                        </a>
                    </div>

                    <!-- Primary Nav -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Home</a>
                        <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">About</a>
                        <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Contact</a>
                    </div>
                </div>

                <!-- Secondary Nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="py-5 px-3 text-gray-700">Login</a>
                    <a href="#" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600">Signup</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg class="w-6 h-6 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden">
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">About</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Contact</a>
        </div>
    </nav>

    <!-- Tailwind and Custom Scripts -->
    @vite('resources/js/app.js')
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</body>
</html>
