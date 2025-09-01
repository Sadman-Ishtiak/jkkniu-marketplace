<x-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Active Auctions</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($auctions as $auction)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $auction->product->images->first() ? asset('storage/' . $auction->product->images->first()->url) : 'https://via.placeholder.com/300' }}" 
                         alt="Auction Item" 
                         class="w-full h-48 object-cover">

                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $auction->product->name }}</h2>
                        <p class="text-gray-600 mt-2">{{ Str::limit($auction->product->description, 80) }}</p>

                        <div class="mt-4">
                            <span class="text-lg font-bold text-indigo-600">${{ number_format($auction->starting_price, 2) }}</span>
                            <a href="{{ route('auctions.show', $auction->id) }}" 
                               class="inline-block bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-200 float-right">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
