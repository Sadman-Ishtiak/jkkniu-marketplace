<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header Section -->
    <header class="bg-white shadow-sm py-4 sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-3xl font-bold text-gray-800">JKKNIU Marketplace</a>
            
            <!-- Right Section: Nav + Auth -->
            <div class="flex items-center space-x-6">
                <!-- Navigation (desktop only) -->
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="/auctions" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Auctions</a>
                    <a href="/buynow" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Buy Now</a>
                    <a href="/stores" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Stores</a>
                    <a href="/categories" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Categories</a>
                </nav>

                <!-- Auth Panel -->
                <div id="auth-panel" class="flex items-center">
                    <a href="/login" id="login-btn" 
                    class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition-colors duration-200">
                    Log In
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Nav -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t mt-2">
            <nav class="flex flex-col space-y-2 p-4">
                <a href="/auctions" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Auctions</a>
                <a href="/buynow" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Buy Now</a>
                <a href="/stores" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Stores</a>
                <a href="/categories" class="text-gray-600 hover:text-gray-900 transition-colors duration-200">Categories</a>
            </nav>
        </div>
    </header>

    <script>
        // Simple toggle for mobile menu
        document.getElementById('mobile-menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    <!-- Main Content (flex-grow makes it expand) -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 flex-grow">
        {{ $slot }}
    </main>

    <!-- Sticky Footer -->
    <footer class="bg-gray-100 border-t py-4 mt-auto">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600">
            <p>&copy; {{ date('Y') }} JKKNIU Marketplace. All rights reserved.</p>
            <div class="space-x-4 mt-2 sm:mt-0">
                <a href="/about" class="hover:text-gray-900">About</a>
                <a href="/contact" class="hover:text-gray-900">Contact</a>
                <a href="/privacy" class="hover:text-gray-900">Privacy Policy</a>
            </div>
        </div>
    </footer>
</body>
</html>
