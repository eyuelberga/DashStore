@props(['name', 'price', 'qty', 'link', 'image'])

<div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col ">
    <a href="{{ $link }}">
        <img class="object-cover w-full h-80 hover:shadow-lg" src="{{ $image }}" alt="{{ $name }}">
        <div class="pt-3">
            <p class="text-center">{{ $name }}</p>
        </div>
        <p class="pt-1 text-center text-gray-900 font-strong">${{ $price }}</p>
    </a>
    {{ $slot }}
</div>
