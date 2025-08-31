@extends('layouts.app') {{-- or your base layout --}}
@section('content')
    <div class="py-6">
        <h1 class="text-2xl font-bold mb-4">Search results for: "{{ $query }}"</h1>

        @if ($results->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($results as $item)
                    <div class="border p-4 rounded shadow-sm">
                        <h2 class="text-xl font-semibold">{{ $item->name }}</h2>
                        <p class="text-gray-600 text-sm">{{ Str::limit($item->description, 100) }}</p>
                        <a href="{{ route('products.show', $item->id) }}" class="text-indigo-600 hover:underline mt-2 inline-block">View Item</a>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $results->links() }}
            </div>
        @else
            <p>No results found.</p>
        @endif
    </div>
@endsection
