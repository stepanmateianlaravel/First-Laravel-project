<x-layout>
<x-slot:heading>
    Posts
</x-slot:heading>

<div class="bg-gray-50/50 min-h-screen py-10">
    <div class="max-w-2xl mx-auto px-4">
        
        @foreach ($posts as $post)
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition-all duration-200 mb-6 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="h-10 w-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-xs shadow-sm">
                            {{ substr($post->user->first_name, 0, 1) }}{{ substr($post->user->last_name, 0, 1) }}
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900 leading-tight">
                                {{ $post->user->first_name }} {{$post->user->last_name}}
                            </span>
                            <span class="text-gray-400 text-xs font-semibold uppercase tracking-tight">
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    <a href="/posts/{{$post->id}}" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>

                <div class="text-gray-800 leading-relaxed text-lg">
                    {{$post->content}}
                </div>

                <div class="mt-6 pt-4 border-t border-gray-50 flex items-center space-x-6">
                    <button disabled class="flex items-center text-gray-400 cursor-not-allowed text-sm font-bold group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Like
                    </button>
                    <button disabled class="flex items-center text-gray-400 cursor-not-allowed text-sm font-bold group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        Comment
                    </button>
                </div>
            </div>
        </div>
        @endforeach

        <div class="mt-10 mb-20">
            {{ $posts->links() ?? '' }}
        </div>
    </div>
</div>
</x-layout>