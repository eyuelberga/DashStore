<x-store-layout :store="$store">

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:px-8 border-b">
            <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">Your Cart</h2>
        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center">
                <x-alert-validation-errors class="mb-4" :errors="$errors" />
                @if (session()->get('cart_errors'))

                    <x-alert-error>
                        <x-slot name="error">
                            <h4 class="text-lg font-medium leading-tight mb-2">Whoops! Something went wrong.</h4>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach (session()->get('cart_errors') as $product => $error)
                                    <li>{{ $product }}: {{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
            </div>
            </x-slot>
            </x-alert-error>
            @endif
            <div>
                <table id="dataTable" class="min-w-full">
                    <thead class="border-b">
                        <tr>
                            <th>
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Product
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Price
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Quantity
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Total
                            </th>
                            <th>
                            </th>


                        </tr>
                    </thead>
                    <tbody>
                        @if (session()->get('cart-' . $store->id))
                            @foreach (session()->get('cart-' . $store->id) as $id => $product)
                                <tr class="border-b">
                                    <td>
                                        <form
                                            action="{{ route('storefront.remove_cart', ['store' => $store, 'id' => $id]) }}"
                                            method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="uppercase px-4 py-1 text-xs text-white bg-red-400 rounded"
                                                type="submit">Remove</button>

                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $product['name'] }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        ${{ $product['price'] }}
                                    </td>
                                    <form action="{{ route('storefront.update_cart', ['store' => $store, 'id' => $id]) }}"
                                        method="post" style="display:inline;">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <x-input type=number name="qty" value="{{ $product['qty'] }}" />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            ${{ $product['price'] * $product['qty'] }}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @csrf
                                            @method('PATCH')
                                            <button class="uppercase px-4 py-1 text-xs text-white bg-blue-400 rounded"
                                                type="submit">Update Item</button>
                                        </td>
                                    </form>

                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                    ${{ array_reduce(session()->get('cart-' . $store->id), fn($carry, $product) => ($carry += $product['price'] * $product['qty']), 0) }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @if (session()->get('cart-' . $store->id))
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="{{ route('storefront.checkout', $store) }}"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Proceed
                            to Checkout</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-store-layout>
