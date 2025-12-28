<x-layout>
<x-slot:heading>
    Post
</x-slot:heading>
<div class="min-h-screen bg-gray-50/50 py-12 px-4">
    <div class="max-w-3xl mx-auto"> <div class="mb-8 flex items-center justify-between px-2">
            <a href="/posts" class="group flex items-center text-sm font-bold text-gray-500 hover:text-gray-900 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Feed
            </a>

            @can('edit', $post)
            <div class="flex items-center space-x-3">
                <a href="/posts/{{ $post->id }}/edit" class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 shadow-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
            </div>
            @endcan
        </div>

        <article class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-hidden">
            
            <div class="p-8 border-b border-gray-50 bg-gray-50/30 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 rounded-full bg-indigo-100 flex items-center justify-center p-0.5 shadow-inner">
                        <img class="w-full h-full rounded-full object-cover" src="https://static.vecteezy.com/system/resources/previews/013/659/054/non_2x/human-avatar-user-ui-account-round-clip-art-icon-vector.jpg" alt="{{$post->user->first_name}}">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900 tracking-tight">{{$post->user->first_name}} {{$post->user->last_name}}</h1>
                        <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">Published {{$post->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>

            <div class="p-10 md:p-16">
                <div class="max-w-none">
                    <p class="text-gray-800 text-xl md:text-2xl leading-relaxed whitespace-pre-wrap font-medium">
                        {{$post->content}}
                    </p>
                </div>
            </div>

            <div class="px-8 py-4 bg-gray-50/50 border-t border-gray-50 flex items-center justify-end">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Post #{{ $post->id }}</span>
            </div>
        </article>
    </div>
</div>
</x-layout>