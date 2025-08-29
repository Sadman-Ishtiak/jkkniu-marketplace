<x-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-sm">
            <!-- Title -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Log In to Your Account</h3>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
            </div>

            <!-- Password -->
            <div class="mb-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200">
            </div>

            <!-- Forgot Password -->
            <div class="flex justify-end mb-4">
                <a href="/forgot-password" class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors">
                    Forgot Password?
                </a>
            </div>

            <!-- Submit -->
            <button id="login-submit-btn"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition-colors duration-200 font-semibold shadow-md">
                Log In
            </button>

            <!-- Login Message -->
            <div id="login-message" class="mt-4 text-center text-sm font-medium hidden"></div>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-2 text-gray-400 text-sm">or</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <!-- Other Options -->
            <div class="space-y-3">
                <!-- Register -->
                <a href="/register"
                   class="block w-full text-center bg-gray-100 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-200 transition-colors duration-200 font-medium">
                   Create New Account
                </a>

                <!-- Google Login
                <a href="/auth/google"
                   class="block w-full text-center bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition-colors duration-200 font-medium">
                   Continue with Google
                </a> -->

                <!-- Back to Home -->
                <a href="/"
                   class="block w-full text-center text-sm text-gray-500 hover:text-gray-700">
                   ← Back to Home
                </a>
            </div>
        </div>
    </div>
</x-layout>
