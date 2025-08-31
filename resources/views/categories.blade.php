<x-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8">All Categories</h1>

        <!-- Categories List -->
        <ul class="space-y-6">
            @foreach ($categories as $category)
                <li class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4 flex justify-between items-center cursor-pointer category-toggle" data-target="category-{{ $category->id }}">
                        <!-- Main Category Title -->
                        <h2 class="text-xl font-semibold text-gray-800">{{ $category->name }}</h2>
                        <!-- Dropdown Arrow -->
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                    <!-- Subcategories Dropdown -->
                    <ul id="category-{{ $category->id }}" class="list-none pl-6 py-2 hidden space-y-2 border-t border-gray-100">
                        @foreach ($category->subcategories as $subcategory)
                            <li class="group">
                                <div class="flex justify-between items-center cursor-pointer subcategory-toggle" data-target="subcategory-{{ $subcategory->id }}">
                                    <a href="/categories/{{ $subcategory->slug }}" class="block text-gray-700 hover:text-indigo-600 transition-colors duration-200 px-2 py-1">
                                        {{ $subcategory->name }}
                                    </a>
                                    <!-- Dropdown Arrow for Sub-subcategories -->
                                    @if ($subcategory->subcategories->count())
                                        <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    @endif
                                </div>
                                <!-- Sub-subcategories Dropdown -->
                                @if ($subcategory->subcategories->count())
                                    <ul id="subcategory-{{ $subcategory->id }}" class="list-none pl-4 py-2 hidden space-y-1">
                                        @foreach ($subcategory->subcategories as $sub_subcategory)
                                            <li>
                                                <a href="/categories/{{ $sub_subcategory->slug }}" class="block text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200 px-2 py-1">
                                                    - {{ $sub_subcategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- JavaScript to Handle Dropdown Toggles -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Main category toggle
            document.querySelectorAll('.category-toggle').forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.dataset.target;
                    const targetElement = document.getElementById(targetId);
                    const arrow = button.querySelector('svg');

                    targetElement.classList.toggle('hidden');
                    arrow.classList.toggle('rotate-180');
                });
            });

            // Subcategory toggle
            document.querySelectorAll('.subcategory-toggle').forEach(button => {
                button.addEventListener('click', (event) => {
                    const targetId = button.dataset.target;
                    const targetElement = document.getElementById(targetId);
                    const arrow = button.querySelector('svg');

                    if (targetElement) {
                        targetElement.classList.toggle('hidden');
                        if (arrow) {
                            arrow.classList.toggle('rotate-90');
                        }
                    }
                    event.stopPropagation(); // Prevents main category dropdown from closing
                });
            });
        });
    </script>
</x-layout>