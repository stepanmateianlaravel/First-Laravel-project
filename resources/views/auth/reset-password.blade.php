<x-layout>
<x-slot:heading>
    Reset Your password
</x-slot:heading>
<div class="min-h-screen flex items-center justify-center p-4 bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-2xl space-y-8 border border-gray-200">
        
        <h2 class="text-3xl font-extrabold text-center text-gray-900">
            Choose a new password
        </h2>

        <form class="space-y-6" action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request('email') }}"/>


            <x-form-wrap>
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" placeholder="password"  name="password"  required/>
                <x-error field="password"/>
            </x-form-wrap>

            <x-form-wrap>
                <x-label for="password_confirmation">Confirm Password</x-label>
                <x-input id="password_confirmation" type="password" placeholder="password_confirmation"  name="password_confirmation"  required/>
                <x-error field="password_confirmation"/>
            </x-form-wrap>
            <x-submit-button>Reset Password</x-submit-button>

        </form>


    </div>
</div>

</x-layout>