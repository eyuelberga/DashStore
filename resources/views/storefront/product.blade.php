<x-store-layout :store="$store">

    <div class="bg-white overflow-hidden">
        <x-alert-validation-errors class="mb-4" :errors="$errors" />
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
                    <p class="mt-2 text-lg text-gray-500">{{ $product->description }}</p>
                    <div class="flex flex-wrap space-x-2 mt-2">
                        @foreach ($product->categories as $category)
                            <span
                                class="px-2 py-1 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease">{{ $category->name }}</span>
                        @endforeach
                    </div>
                    <form method="post" action="{{ route('storefront.add_cart', $store) }}">
                        @csrf
                        <input hidden name="id" value="{{ $product->id }}" />
                        <input hidden name="name" value="{{ $product->name }}" />
                        <input hidden name="price" value="{{ $product->price }}" />

                        <div class="mt-6 px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <x-input type=number name="qty" required placeholder="Quantity" />
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                                to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-store-layout>
