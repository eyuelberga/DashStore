<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($order->first_name . ' ' . $order->last_name) }}
        </h2>
    </x-slot>

    <x-slot name="action">
        <span
            class="px-3 py-2 rounded-full text-gray-500 bg-gray-200 font-semibold text-sm flex align-center w-max active:bg-gray-300 transition duration-300 ease">{{ $order->status }}</span>
    </x-slot>


    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-4 md:gap-6">
            <div class="md:col-span-2">
                <div class="border-b">
                    <h3 class="text-lg font-strong bg-gray-50 py-4 px-2 leading-6 text-gray-900">Orders</h3>
                    <table class="min-w-full">
                        <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Product
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Quantity
                                </th>

                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Price
                                </th>

                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Total
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order->products as $product)
                                <tr class="border-b">

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $product->pivot->qty }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        ${{ $product->pivot->price }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        ${{ $product->pivot->qty * $product->pivot->price }}
                                    </td>



                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                    ${{ array_reduce($order->products->toArray(), fn($carry, $product) => ($carry += $product['pivot']['price'] * $product['pivot']['qty']), 0) }}
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <h3 class="text-lg font-strong bg-gray-50 py-4 px-2 leading-6 text-gray-900">Customer Details</h3>

                <div class=" overflow-hidden">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-700">First name</label>
                                <input disabled value="{{ $order->first_name }}" type="text" name="first_name"
                                    id="first_name" autocomplete="given_name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                <input disabled value="{{ $order->last_name }}" type="text" name="last_name"
                                    id="last_name" autocomplete="family_name"
                                    class="mt-1 disabled focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="company_name" class="block text-sm font-medium text-gray-700">Company name
                                    [optional]</label>
                                <input disabled value="{{ $order->company_name }}" type="text" name="company_name"
                                    id="company_name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email
                                    address</label>
                                <input disabled value="{{ $order->email }}" type="email" name="email"
                                    id="email" autocomplete="email"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input disabled value="{{ $order->phone }}" type="tel" name="phone"
                                    id="phone" autocomplete="phone"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <input disabled value="{{ $order->country }}" type="tel" name="phone"
                                    id="phone" autocomplete="phone"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input disabled value="{{ $order->city }}" type="text" name="city"
                                    id="city" autocomplete="address-level2"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="address_1" class="block text-sm font-medium text-gray-700">Address Line
                                    1</label>
                                <input disabled value="{{ $order->address_1 }}" type="text" name="address_1"
                                    id="address_1" autocomplete="address_1"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="address_2" class="block text-sm font-medium text-gray-700">Address Line 2
                                    [optional]</label>
                                <input disabled value="{{ $order->address_2 }}" type="text" name="address_2"
                                    id="address_2" autocomplete="address_1"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div class="col-span-6">
                                <label for="postcode" class="block text-sm font-medium text-gray-700">ZIP / Postal
                                    code</label>
                                <input disabled value="{{ $order->postcode }}" type="text" name="postcode"
                                    id="postcode" autocomplete="postcode"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-alert-validation-errors class="mb-4" :errors="$errors" />
                        <form method="post" action="{{ route('orders.update', $order->id) }}">
                            @csrf
                            @method('PATCH')
                            <select
                                class="
        form-control
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
                                name="status" required>
                                <option value="ordered" @if ($order->status == 'ordered') selected @endif>ORDERED
                                </option>
                                <option value="paid" @if ($order->status == 'paid') selected @endif>PAID</option>
                                <option value="shipped" @if ($order->status == 'shipped') selected @endif>SHIPPED
                                </option>
                                <option value="delivered" @if ($order->status == 'delivered') selected @endif>DELIVERED
                                </option>
                            </select>

                            <button type="submit"
                                class="uppercase px-4 py-2 text-sm text-white bg-blue-400 rounded">Update
                                Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
