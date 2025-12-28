<x-layout>
    <x-slot:heading>Your Profile</x-slot:heading>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <div class="w-full lg:w-1/3 space-y-6">
                
                <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-200">
                    <div class="flex flex-col items-center text-center">
                        <a href="/view-profile" class="relative inline-block">
                            <img class="h-24 w-24 rounded-full object-cover border-4 border-indigo-500 shadow-sm" src="https://static.vecteezy.com/system/resources/previews/013/659/054/non_2x/human-avatar-user-ui-account-round-clip-art-icon-vector.jpg" alt="User Avatar">
                        </a>
                        <h3 class="mt-4 text-xl font-bold text-gray-900">{{$user->first_name}} {{$user->last_name}}</h3>
                        <p class="text-sm text-gray-500">{{$user->email}}</p>
                        <span class="inline-flex items-center px-3 py-1 mt-3 rounded-full text-xs font-bold bg-green-100 text-green-800">
                            {{$user->admin ? "Admin Account" : "Standard User"}}
                        </span>
                        <p class="mt-4 pt-4 border-t border-gray-100 w-full text-xs text-gray-400">
                            Member since {{$user->created_at}}
                        </p>
                    </div>
                </div>

                <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-200">
                    <h4 class="text-lg font-bold text-gray-900 mb-6">Edit Profile</h4>
                    
                    <form class="space-y-4" action="/profile" method="POST">
                        @csrf
                        @method('PATCH')

                        <x-form-wrap>
                            <x-label for="first_name">First Name</x-label>
                            <x-input id="first_name" type="text" placeholder="First Name" name="first_name" required value="{{$user->first_name}}"/>
                            <x-error field="first_name"/>
                        </x-form-wrap>

                        <x-form-wrap>
                            <x-label for="last_name">Last Name</x-label>
                            <x-input id="last_name" type="text" placeholder="Last Name" name="last_name" required value="{{$user->last_name}}"/>
                            <x-error field="last_name"/>
                        </x-form-wrap>

                        <x-form-wrap>
                            <x-label for="email">Email</x-label>
                            <x-input id="email" type="text" placeholder="Email" name="email" required value="{{$user->email}}"/>
                            <x-error field="email"/>
                        </x-form-wrap>

                        <div class="pt-2">
                            <x-submit-button class="w-full justify-center">Update Details</x-submit-button>
                        </div>
                    </form>

                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <a href="/profile-delete" class="block text-center text-sm font-bold text-red-500 hover:text-red-700 transition-colors">
                            Delete Account
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex-1 space-y-6">
                <div class="flex items-center justify-between px-2">
                    <h2 class="text-2xl font-black text-gray-900 tracking-tight">Your Posts</h2>
                    <a href="/posts/create" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition">
                        + New Post
                    </a>
                </div>

                @forelse($posts as $post)
                    <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-100 hover:border-indigo-200 transition-all group">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 rounded-full bg-indigo-500"></div>
                                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>
                            
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity flex space-x-3">
                                <a href="/posts/{{$post->id}}/edit" class="text-gray-400 hover:text-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        
                        <p class="text-gray-800 text-lg leading-relaxed">
                            {{ $post->content }}
                        </p>
                    </div>
                @empty
                    <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl p-20 text-center">
                        <p class="text-gray-400 font-medium">No posts yet. Start sharing your thoughts!</p>
                    </div>
                @endforelse
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            </div>

        </div>
    </div>
</x-layout>