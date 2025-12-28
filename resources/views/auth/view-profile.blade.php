<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visit profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="min-h-screen flex items-center justify-center p-4 bg-gray-100">
    
    <div class="max-w-sm w-full bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-200">
        
        <div class="bg-indigo-600 h-24 flex items-center justify-center">
            </div>

        <div class="px-6 pb-6 -mt-12">
            
            <div class="flex justify-center">
                <img class="h-24 w-24 rounded-full object-cover border-4 border-white shadow-lg" 
                     src="https://static.vecteezy.com/system/resources/previews/013/659/054/non_2x/human-avatar-user-ui-account-round-clip-art-icon-vector.jpg" 
                     alt="User Avatar">
            </div>

            <div class="text-center mt-4">
                <h3 class="text-3xl font-bold text-gray-900">{{$user->first_name}} {{$user->last_name}}</h3>
            </div>

            <div class="border-t border-gray-200 my-6"></div>

            <div class="space-y-4">
                
                <div class="flex items-center text-gray-700">
                    <svg class="h-5 w-5 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <span class="font-semibold text-gray-900">Email:</span>
                    <span class="ml-2">{{$user->email}}</span>
                </div>
                

                <div class="flex items-center text-gray-700">
                    <svg class="h-5 w-5 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3 .895 3 2s-1.343 2-3 2h-4.667a1 1 0 010-2H12zm0 0c-1.657 0-3-.895-3-2s1.343-2 3-2h4.667a1 1 0 010 2H12zM5 12h14M3 17h18a2 2 0 002-2v-4a2 2 0 00-2-2H3a2 2 0 00-2 2v4a2 2 0 002 2z" /></svg>
                    <span class="font-semibold text-gray-900">Status:</span>
                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        {{$user->admin ? "Admin" : "User"}}
                    </span>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-6">
                <x-nav-link href="/profile" class="mt-2 bg-indigo-500 hover:bg-indigo-700">
                    Back
                </x-nav-link>
            </div>
            
        </div>
    </div>
</div>

</body>
</html>