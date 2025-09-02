<x-layout>
    <div class="text-center py-12 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-lg shadow-lg mb-12">
        <h1 class="text-5xl font-extrabold mb-4">Welcome to JKKNIU Marketplace</h1>
        <p class="text-lg max-w-2xl mx-auto">Your one-stop hub for buying, selling, and auctioning items tailored for JKKNIU students and alumni.</p>
    </div>

    <!-- Live Auctions Section -->
    <section id="auctions" class="mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-indigo-500 pb-2">🔥 Live Auctions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($auctions as $auction)
                <a href="{{ route('auctions.view', $auction->id) }}" class="block group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                        <img src="{{ asset('storage/' . ($auction->images->first()->url ?? 'placeholder.jpg')) }}"
                             alt="{{ $auction->name }}"
                             class="w-full h-48 object-cover group-hover:scale-105 transform transition duration-300">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $auction->name }}</h3>
                            <p class="text-sm font-bold text-indigo-600 mt-2">
                                Starting Price: ৳{{ number_format($auction->starting_price, 2) }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">Ends: {{ $auction->end_date?->format('M d, Y h:i A') ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 text-lg">No live auctions at the moment. 🚫</p>
            @endforelse
        </div>
    </section>

    <!-- Buy Now Items Section -->
    <section id="buynow" class="mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 border-green-500 pb-2">🛒 Buy Now</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($buynow as $product)
                <a href="/products/{{ $product->id }}" class="block group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                        <img src="{{ asset('storage/' . ($product->images->first()->file_path ?? 'placeholder.jpg')) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-48 object-cover group-hover:scale-105 transform transition duration-300">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="text-sm font-bold text-green-600 mt-2">
                                Price: ৳{{ number_format($product->price, 2) }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">Stock: {{ $product->stock ?? 'N/A' }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 text-lg">No items available for instant purchase. 🚫</p>
            @endforelse
        </div>
    </section>
</x-layout>
