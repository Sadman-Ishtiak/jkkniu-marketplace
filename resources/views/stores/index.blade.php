<x-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Explore Our Stores</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($stores as $store)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <a href="{{ url('/stores/' . $store->slug) }}">
                        <img src="{{ $store->image ?? 'https://via.placeholder.com/400x250.png?text=Store+Image' }}" 
                             alt="{{ $store->name }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $store->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">Owner: {{ $store->owner->name ?? 'Unknown' }}</p>
                            <p class="text-sm text-gray-600 mt-2">{{ $store->description ?? 'No description available.' }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
