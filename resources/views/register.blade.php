<x-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-sm">
            <!-- Title -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Create Your Account</h3>
            </div>

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200 
                           focus:ring-opacity-50 transition-all duration-200">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200 
                           focus:ring-opacity-50 transition-all duration-200">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200 
                           focus:ring-opacity-50 transition-all duration-200">
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                           focus:border-indigo-500 focus:ring focus:ring-indigo-200 
                           focus:ring-opacity-50 transition-all duration-200">
            </div>

            <!-- Register Button -->
            <button id="register-submit-btn"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md 
                       hover:bg-indigo-700 transition-colors duration-200 
                       font-semibold shadow-md">
                Sign Up
            </button>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-2 text-gray-400 text-sm">or</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <!-- Back to Login -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <a href="/login" class="text-indigo-600 hover:text-indigo-800 font-medium">
                        Log In
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
