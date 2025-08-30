<x-layout>
    <h1 class="text-4xl font-bold mb-4">Welcome to JKKNIU Marketplace</h1>
    <p class="text-lg text-gray-700" >The one-stop marketplace for buying and selling items tailored for JKKNIU students and alumni.</p>

    <!-- Auction Items Section -->
    <section id="auctions" class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-indigo-500 pb-2">Live Auctions</h2>
        <div id="auction-items-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Auction items will be dynamically inserted here -->
        </div>
    </section>

    <!-- buynow Items Section -->
    <section id="buynow" class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-indigo-500 pb-2">buynow</h2>
        <div id="buynow-items-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- buynow items will be dynamically inserted here -->
        </div>
    </section>
</x-layout>