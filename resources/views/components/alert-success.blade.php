@props(['success'])

@if ($success)
    <div {{ $attributes->merge(['class' => 'bg-green-100 rounded-lg py-5 px-6 my-4 text-base text-green-700']) }}
        role="alert">

        {{ $success }}
    </div>
@endif
