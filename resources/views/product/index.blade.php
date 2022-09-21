<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <x-slot name="action">
        <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ route('products.create') }}">New Product</a>
    </x-slot>
    <x-alert-validation-errors class="mb-4" :errors="$errors" />
    <x-data-table :headers="['Name', 'Price', 'Quantity', 'Categories', 'Actions']">
        @foreach ($products as $product)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $product->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $product->price }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $product->qty }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <div class="flex flex-wrap space-x-2">
                        @foreach ($product->categories as $category)
                            <span
                                class="px-2 py-1 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max cursor-pointer active:bg-gray-300 transition duration-300 ease">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </td>

                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a class="uppercase px-4 py-1 text-xs text-white bg-blue-400 rounded"
                        href="{{ route('products.show', $product) }}">View</a>
                    <a class="uppercase px-4 py-1 text-xs text-white bg-blue-400 rounded"
                        href="{{ route('products.edit', $product) }}">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="uppercase px-4 py-1 text-xs text-white bg-red-400 rounded"
                            type="submit">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </x-data-table>
</x-app-layout>
