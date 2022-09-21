<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product') }}
        </h2>
    </x-slot>
    <x-alert-validation-errors class="mb-4" :errors="$errors" />
    <form method="post" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="block mt-2">
            <x-label for="name" :value="__('Product Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name" required autofocus />
        </div>

        <div class="block mt-2">
            <x-label for="price" :value="__('Price')" />

            <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="$product->price" required
                step="any" />
        </div>

        <div class="block mt-2">
            <x-label for="qty" :value="__('Quantity')" />

            <x-input id="qty" class="block mt-1 w-full" type="number" name="qty" :value="$product->qty" required />
        </div>

        <div class="block mt-2">
            <x-label for="image" :value="__('Image')" />

            <x-input id="image"
                class="form-control
    block
    w-full
    px-3
    py-1.5
    text-base
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                type="file" name="image" :value="old('image')" />
        </div>

        <div class="block mt-2">
            <x-label for="description" :value="__('Description')" />
            <textarea
                class="
        form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
                name="description" placeholder="Description" required>{{ $product->description }}</textarea>
        </div>

        <div class="block mt-2">
            <x-label for="categories" :value="__('Categories')" />
            <select
                class="
        form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        mb-2
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
      "
                name="categories[]" multiple>
                @foreach ($categories as $category)
                    <option @if ($product->categories->contains($category->id)) selected @endif value="{{ $category->id }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center justify-end mt-4">

            <x-button>
                {{ __('Update') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
