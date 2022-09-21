<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($product->name) }}
        </h2>
    </x-slot>
    <x-slot name="action">
        <div>
            <a class="uppercase px-4 py-2 text-sm text-white bg-blue-400 rounded"
                href="{{ route('products.edit', $product) }}">Edit</a>
            <form action="{{ route('products.destroy', $product) }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="uppercase px-4 py-2 text-sm text-white bg-red-400 rounded" type="submit">Delete</button>
            </form>
        </div>
    </x-slot>
    <x-alert-validation-errors class="mb-4" :errors="$errors" />
    <div class="bg-white overflow-hidden">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="py-6 px-4 sm:px-6 lg:px-8 ">
                        <img class=" object-cover w-full" src="{{ $product->image }}" alt="{{ $product->name }}">
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <h2 class="text-xl font-semibld py-4 leading-6 text-gray-900">{{ $product->name }}</h2>
                    <h3 class="text-lg font-strong py-2 leading-6 text-gray-800">${{ $product->price }}</h3>
                    <h3 class="text-lg font-strong py-2 leading-6 text-gray-800">Quantity: {{ $product->qty }}</h3>
                    <p class="mt-2 text-lg text-gray-500">{{ $product->description }}</p>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        @foreach ($product->categories as $category)
                            <span
                                class="px-2 py-1 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
