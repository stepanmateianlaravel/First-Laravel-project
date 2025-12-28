<x-layout>
<x-slot:heading>
Admin Dashboard
</x-slot:heading>
<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
<div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
    <h2 class="text-xl font-bold text-gray-800">Admin User Management</h2>
    <a href="/admin/create" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md text-sm transition duration-150 ease-in-out">
        + Add New User
    </a>
</div>

        
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Email Verified at
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Role
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            
            <tbody>
        @forelse ($users as $user)

                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{$user->id}}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$user->first_name}} {{$user->last_name}}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$user->email}}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{$user->email_verified_at ? "verified" : "pending"}}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs">{{$user->admin ? "Admin" : "User"}}</span>
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex space-x-3">
                            <a href="/admin/{{$user->id}}/edit" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                            </div>
                            <form action="/admin/{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <div class="flex space-x-3">
                            <button class="text-red-600 hover:text-red-900 font-medium">Delete</button>
                      
                            </div>
                                  </form>
                    </td>
                </tr>

                            
        @empty
                <tr>
            <td colspan="6" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                No current users available.
            </td>
        </tr>
        @endforelse
            </tbody>
        </table>

      
    </div>
</div>

<div class="mb-10">
  {{ $users->links() }}
  </div>


</x-layout>