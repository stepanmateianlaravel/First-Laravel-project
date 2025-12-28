<x-layout>
<x-slot:heading>
    Forgot Password?
</x-slot:heading>
<div class="min-h-screen flex items-center justify-center p-4 bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-2xl space-y-8 border border-gray-200">
        
        <h2 class="text-3xl font-extrabold text-center text-gray-900">
            Reset your password with email
        </h2>

        <form class="space-y-6" action="/forgot-password" method="POST">
            @csrf
            <x-form-wrap>
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" placeholder="Email"  name="email"  required/>
                <x-error field="email"/>
            </x-form-wrap>

            <x-submit-button>Send Email</x-submit-button>

        </form>


    </div>
</div>

</x-layout>