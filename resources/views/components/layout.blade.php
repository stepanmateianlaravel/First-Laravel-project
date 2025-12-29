<!DOCTYPE html>
<html lang="en"  class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
              <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
              @auth
              <x-nav-link href="/posts" :active="request()->is('posts')">Posts</x-nav-link>
              @can('admin', App\Models\User::class)
              <x-nav-link href="/admin" :active="request()->is('admin')">Admin Panel</x-nav-link>
                              
              @endcan
              @endauth
            </div>
          </div>
        </div>
<div class="hidden md:block">
    <div class="ml-4 flex items-center md:ml-6">
        <div class="relative flex items-center space-x-4">
            @auth

                <form action="/logout" method="POST" class="flex items-center">
                    @csrf
                    @method('DELETE')
                    <x-submit-button>
                        Logout
                    </x-submit-button>
                </form>

                <a href="/profile" class="relative flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition">
                    <span class="sr-only">Open user menu</span>
                    <img src="https://static.vecteezy.com/system/resources/previews/013/659/054/non_2x/human-avatar-user-ui-account-round-clip-art-icon-vector.jpg" 
                         alt="User profile" 
                         class="size-8 rounded-full border border-gray-700" />
                </a>

            @endauth

            @guest
                <div class="flex items-center space-x-2">
                    <x-nav-link href="/login" :active="request()->is('login')">
                        Login
                    </x-nav-link>

                    <x-nav-link href="/register" :active="request()->is('register')">
                        Register
                    </x-nav-link>
                </div>
            @endguest
        </div>
    </div>
</div>
      </div>
    </div>

  </nav>

<header class="relative bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex items-center justify-between">
        
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                {{ $heading }}
            </h1>
        </div>

        @auth
        <div class="flex items-center gap-4">
            <a href="/posts/create" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create Post
            </a>
        </div>
                    
        @endauth
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 shadow-sm" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 shadow-sm" role="alert">
                <p class="font-bold">Error</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>
</header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
</div>
    
</body>
</html>