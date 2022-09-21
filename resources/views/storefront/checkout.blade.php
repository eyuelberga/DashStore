<x-store-layout :store="$store">

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:px-8 border-b">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Checkout</h2>
        </div>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="py-6 px-4 sm:px-6 lg:px-8 border-b">
                        <h3 class="text-lg font-strong bg-gray-50 py-4 px-2 leading-6 text-gray-900">Your Order</h3>
                        <table id="dataTable" class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Product
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Total
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (session()->get('cart-' . $store->id))
                                    @foreach (session()->get('cart-' . $store->id) as $id => $product)
                                        <tr class="border-b">

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $product['name'] }} x {{ $product['qty'] }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                ${{ $product['price'] * $product['qty'] }}
                                            </td>



                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                            ${{ array_reduce(session()->get('cart-' . $store->id), fn($carry, $product) => ($carry += $product['price'] * $product['qty']), 0) }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <x-alert-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('storefront.store_order', $store) }}">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first_name" class="block text-sm font-medium text-gray-700">First
                                            name</label>
                                        <input type="text" name="first_name" id="first_name" autocomplete="given_name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last
                                            name</label>
                                        <input type="text" name="last_name" id="last_name" autocomplete="family_name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="company_name"
                                            class="block text-sm font-medium text-gray-700">Company name
                                            [optional]</label>
                                        <input type="text" name="company_name" id="company_name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email
                                            address</label>
                                        <input type="email" name="email" id="email" autocomplete="email"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                        <input type="tel" name="phone" id="phone" autocomplete="phone"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country"
                                            class="block text-sm font-medium text-gray-700">Country</label>
                                        <select id="country" name="country" autocomplete="country_name"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option>Canada</option>
                                            <option>Ethiopia</option>
                                            <option>Israel</option>
                                            <option>Mexico</option>
                                            <option>United States</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                        <input type="text" name="city" id="city" autocomplete="address-level2"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="address_1" class="block text-sm font-medium text-gray-700">Address
                                            Line 1</label>
                                        <input type="text" name="address_1" id="address_1" autocomplete="address_1"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="address_2" class="block text-sm font-medium text-gray-700">Address
                                            Line 2 [optional]</label>
                                        <input type="text" name="address_2" id="address_2" autocomplete="address_1"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="postcode" class="block text-sm font-medium text-gray-700">ZIP /
                                            Postal code</label>
                                        <input type="text" name="postcode" id="postcode" autocomplete="postcode"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Place
                                    Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-store-layout>
