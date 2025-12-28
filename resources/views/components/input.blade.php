<div class="mt-1">
    <input {{$attributes->merge([
        'type' => 'text',
        'placeholder' => 'placeholder',
        'class' => "appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white",
        'required' => false
    ])}}>
</div>

{{-- id="username" name="username" type="text" autocomplete="username" required --}}