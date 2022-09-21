@props(['error'])

@if ($error)
    <div {{ $attributes->merge(['class' => 'bg-red-100 rounded-lg py-5 px-6 my-4 text-base text-red-700']) }}
        role="alert">

        {{ $error }}
    </div>
@endif
