<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <x-data-table :headers="['Last updated', 'ID', 'Status', 'Customer Name', 'Phone', 'Email', 'Country', 'Actions']">
        @foreach ($orders as $order)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                    {{ $order->updated_at }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                    {{ $order->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                    {{ $order->status }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                    {{ $order->first_name }} {{ $order->last_name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                    {{ $order->phone }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                    {{ $order->email }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                    {{ $order->country }}
                </td>
                <td class="text-xs text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a class="uppercase px-4 py-1 text-xs text-white bg-blue-400 rounded"
                        href="{{ route('orders.show', $order->id) }}">View</a>
                </td>

            </tr>
        @endforeach
    </x-data-table>
</x-app-layout>
