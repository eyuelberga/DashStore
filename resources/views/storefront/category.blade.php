<x-store-layout :store="$store">

    <div class="container mx-auto">
        <x-cart-modal :store="$store" />
        <x-alert-validation-errors class="mb-4" :errors="$errors" />
        <div class="flex items-center flex-wrap pt-4 pb-12">
            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                        href="#">
                        {{ $category->name }}
                    </a>

            </nav>

            @foreach ($category->products()->paginate(5) as $product)
                <x-product-card :link="route('storefront.category_product', [
                    'store' => $store,
                    'category' => $category,
                    'product' => $product,
                ])" :image="$product->image" :name="$product->name" :qty="$product->qty"
                    :price="$product->price">
                    <div class="px-4 py-3 text-center sm:px-6">
                        <x-button
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            onclick="openModal('{{ $product->id }},{{ $product->name }},{{ $product->price }},{{ $product->description }},{{ $product->image }}')">
                            {{ __('Add to Cart') }}
                        </x-button>
                    </div>
                </x-product-card>
            @endforeach
        </div>



        <div class="flex justify-center flex-col p-6">
            {!! $category->products()->paginate(5)->links() !!}
            <div>
            </div>

</x-store-layout>
