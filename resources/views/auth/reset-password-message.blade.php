
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>password confirmation successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@props(['status'])

<div {{ $attributes->merge(['class' => 'max-w-md mx-auto']) }}>
    <div class="rounded-xl bg-green-50 p-6 border border-green-100 shadow-sm text-center">
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h3 class="text-lg font-bold text-green-900 mb-1">
            Success!
        </h3>
        <p class="text-sm text-green-700 leading-relaxed">
            {{ $status ?? ''}}
        </p>

        <div class="mt-6">
            <a href="/login" 
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                Return to Login
            </a>
        </div>
    </div>
</div>
</body>
</html>