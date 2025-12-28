<x-layout>
    <x-slot:heading>
        Account Settings
    </x-slot:heading>

    <div class="max-w-2xl mx-auto mt-10">
        <div class="bg-white border-2 border-red-100 rounded-xl overflow-hidden shadow-sm">
            
            <div class="bg-red-50 px-6 py-4 border-b border-red-100">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <h2 class="text-xl font-bold text-red-800">Danger Zone</h2>
                </div>
            </div>

            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Delete Account</h3>
                <p class="text-sm text-gray-600 leading-relaxed mb-6">
                    Once you delete your account, there is no going back. All of your projects, data, and settings will be removed from our servers immediately. Please be certain.
                </p>

                <form action="/profile" method="POST" class="space-y-4">
                    @csrf
                    @method('DELETE')
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            class="w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md focus:ring-red-500 focus:border-red-500 outline-none transition-all"
                            placeholder="Enter your password to confirm"
                            required
                        >
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <x-submit-button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition-colors shadow-sm">
                            Permanently Delete My Account
                        </x-submit-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>