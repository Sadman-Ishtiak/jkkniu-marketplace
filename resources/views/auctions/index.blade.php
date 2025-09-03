<x-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Active Auctions</h1>

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
    </div>
</x-layout>
