<x-layout>
<x-slot:heading>
    Sign in
</x-slot:heading>
<div class="min-h-screen flex items-center justify-center p-4 bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-2xl space-y-8 border border-gray-200">
        
        <h2 class="text-3xl font-extrabold text-center text-gray-900">
            Log into your account
        </h2>

        <form class="space-y-6" action="/login" method="POST">
            @csrf
            <x-form-wrap>
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" placeholder="Email"  name="email"  required :value="old('email')"/>
                <x-error field="email"/>
            </x-form-wrap>


            <x-form-wrap>
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" placeholder="password"  name="password"  required/>
                <x-error field="password"/>
            </x-form-wrap>

            <x-terms-and-conditions/>
            <x-submit-button>Register</x-submit-button>

                    <x-forgot-password/>
        </form>


    </div>
</div>

</x-layout>