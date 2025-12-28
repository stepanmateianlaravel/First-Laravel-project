<x-layout>
    <x-slot:heading>
        Edit User: {{ $user->first_name }} {{ $user->last_name }}
    </x-slot:heading>

    <div class="max-w-2xl mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            <form action="/admin/{{ $user->id }}" method="POST" class="p-6">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" value="{{$user->first_name}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" value="{{$user->last_name}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" value="{{$user->email}}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>

                    <hr class="border-gray-200">

                    <div class="bg-gray-50 p-4 rounded-md space-y-4">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase">Administrative Settings</h3>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">User Role</label>
                            <select name="admin" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                                <option value="0">Regular User</option>
                                <option value="1">Administrator</option>
                            </select>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="verified" id="verified" class="h-4 w-4 text-indigo-600 border-gray-300 rounded" value="verified">
                            <label for="verified" class="ml-2 block text-sm text-gray-900">
                                Mark as Email Verified
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-gray-200 pt-6">
                    <a href="/admin" class="text-sm font-semibold text-gray-600 hover:text-gray-900">Cancel</a>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 font-medium">
                        Update User Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>