<x-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Sale Items</h1>

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
    </div>
</x-layout>