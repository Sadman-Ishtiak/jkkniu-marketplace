<x-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-sm">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Log In to Your Account</h3>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" value="test@example.com"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" value="password123"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
            </div>
            <button id="login-submit-btn"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-200 font-semibold shadow-md">
                Submit
            </button>
            <div id="login-message" class="mt-4 text-center text-sm font-medium hidden"></div>
        </div>
    </div>
</x-layout>
