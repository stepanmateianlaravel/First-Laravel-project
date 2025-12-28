@props([
    'field' => null
])


@error($field)
    <p class="text-red-500 text-sm italic">{{$message}}</p>
@enderror