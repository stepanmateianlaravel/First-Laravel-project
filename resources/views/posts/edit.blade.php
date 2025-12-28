
<x-layout>
<x-slot:heading>
    Edit Post
</x-slot:heading>


<div class="max-w-3xl mx-auto py-12 px-4">
    <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
        
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h2 class="text-xl font-bold text-gray-900">Edit your post</h2>
        </div>

        <form action="/posts/{{ $post->id }}" method="POST" class="p-6">
            @csrf
            @method('PATCH')
            <div class="space-y-6">
                
                <div>
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                        Edit Content
                    </label>
<textarea 
    id="content" 
    name="content" 
    rows="8" 
    class="w-full block rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-lg p-4 transition-all placeholder-gray-400 font-sans leading-relaxed text-gray-700"
    placeholder="Write something amazing...">{{$post->content}}</textarea>
                </div>

                <x-error field="content"/>

                <div class="flex items-center space-x-2 text-amber-600 bg-amber-50 p-3 rounded-lg border border-amber-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-xs font-medium">Keep it respectful and engaging for your followers.</span>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                    <a href="/posts/{{$post->id}}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors">
                        Cancel
                    </a>
                    <x-submit-button>
                        Publish Post
                    </x-submit-button>
                </div>
            </div>
        </form>

                <form action="/posts/{{$post->id}}" method="POST" id="delete-post">
                        @csrf
                        @method('DELETE')
                        <x-submit-button class="bg-red-500 hover:bg-red-700">
                            DELETE
                        </x-submit-button>
                    </form>
    </div>
</div>

</x-layout>