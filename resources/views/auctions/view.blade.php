<x-layout>
    <div class="max-w-3xl mx-auto py-8">
        <!-- Auction Title -->
        <h1 class="text-2xl font-bold mb-4">
            {{ $auction->product->name ?? 'Unnamed Product' }}
        </h1>

        <!-- Auction Info -->
        <div class="space-y-2 text-gray-700">
            <p><strong>Start Price:</strong> {{ $auction->starting_price }} ৳</p>
            <p><strong>Current Price:</strong> {{ $auction->current_price ? $auction->current_price . ' ৳' : 'No bids yet' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($auction->status) }}</p>
            <p><strong>Start Date:</strong> {{ $auction->created_at->format('d M Y H:i') }}</p>
            <p><strong>End Date:</strong> {{ $auction->ends_at }}</p>
        </div>

        <!-- Countdown Timer -->
        <div class="mt-4 p-4 bg-gray-100 rounded">
            <h2 class="text-lg font-semibold mb-2">Time Remaining:</h2>
            <p id="countdown" class="text-xl font-bold text-red-600"></p>
        </div>

        <!-- Images -->
        <h2 class="text-xl font-semibold mt-6 mb-2">Images</h2>
        <div class="grid grid-cols-2 gap-4">
            @forelse ($auction->product->images as $image)
                <img src="{{ $image->url }}" alt="Product Image" class="rounded shadow">
            @empty
                <p>No images available.</p>
            @endforelse
        </div>
    </div>

    <!-- Countdown Script -->
    <script>
        const endTime = new Date("{{ $auction->ends_at }}").getTime();
        const countdownEl = document.getElementById("countdown");

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance <= 0) {
                countdownEl.innerHTML = "Auction ended";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownEl.innerHTML =
                `${days}d ${hours}h ${minutes}m ${seconds}s`;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>
</x-layout>
