<x-layout>
<x-slot:heading>
    Register
</x-slot:heading>
<div class="min-h-screen flex items-center justify-center p-4 bg-gray-100">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-2xl space-y-8 border border-gray-200">
        
        <h2 class="text-3xl font-extrabold text-center text-gray-900">
            Register Account
        </h2>

        <form class="space-y-6" action="/register" method="POST">
            @csrf
            <x-form-wrap>
                <x-label for="first_name">First Name</x-label>
                <x-input id="first_name" type="text" placeholder="First Name" name="first_name" required/>
                <x-error field="first_name"/>
            </x-form-wrap>

            <x-form-wrap>
                <x-label for="last_name">Last Name</x-label>
                <x-input id="last_name" type="text" placeholder="Last Name"  name="last_name"  required/>
                <x-error field="last_name"/>
            </x-form-wrap>

            <x-form-wrap>
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" placeholder="Email"  name="email"  required/>
                <x-error field="email"/>
            </x-form-wrap>


            <x-form-wrap>
                <x-label for="password">Password</x-label>
                <x-input id="password" type="password" placeholder="password"  name="password"  required/>
                <x-error field="password"/>
            </x-form-wrap>

            <x-form-wrap>
                <x-label for="password_confirmation">Confirm Password</x-label>
                <x-input id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation" required/>
            </x-form-wrap>

            <x-terms-and-conditions/>
            <x-submit-button>Register</x-submit-button>
        </form>
        <x-have-an-account-question/>

    </div>
</div>

</x-layout>