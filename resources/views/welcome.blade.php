<x-layout>
    <h1 class="text-4xl font-bold mb-4">Welcome to JKKNIU Marketplace</h1>
    <p class="text-lg text-gray-700">The one-stop marketplace for buying and selling items tailored for JKKNIU students and alumni.</p>

    <!-- Live Auctions Section -->
    <section id="auctions" class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-indigo-500 pb-2">Live Auctions</h2>
        <div id="auction-items-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($auctions as $product)
                <a href="/products/{{ $product->id }}" class="block">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ asset('storage/' . ($product->images->first()->url ?? 'placeholder.jpg')) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-sm font-bold text-gray-900 mt-2">
                                Starting Price: ৳{{ number_format($product->price, 2) }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">Auction ends: {{ $product->end_date ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 text-lg">No live auctions available at the moment.</p>
            @endforelse
        </div>
    </section>

    <!-- Buy Now Items Section -->
    <section id="buynow" class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-indigo-500 pb-2">Buy Now</h2>
        <div id="buynow-items-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($buynow as $product)
                <a href="/products/{{ $product->id }}" class="block">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="{{ asset('storage/' . ($product->images->first()->url ?? 'placeholder.jpg')) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-sm font-bold text-gray-900 mt-2">
                                Price: ৳{{ number_format($product->price, 2) }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">Stock: {{ $product->stock ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 text-lg">No "buy now" items available at the moment.</p>
            @endforelse
        </div>
    </section>
</x-layout>
