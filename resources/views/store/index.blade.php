<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>
    <x-alert-validation-errors :errors="$errors" />
    <x-data-table :headers="['Store Name', 'Products', 'Categories', 'Orders', 'Status', 'Actions']">
        @foreach ($stores as $store)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $store->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $store->products()->count() }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $store->categories()->count() }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $store->orders()->count() }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    @if ($store->active)
                        ACTIVE
                    @else
                        DEACTIVATED
                    @endif
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a target="_blank" class="uppercase px-4 py-1 text-xs text-white bg-blue-400 rounded"
                        href="{{ route('storefront.index', $store) }}">View</a>
                    <form action="{{ route('stores.update', $store) }}" method="post" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        @if ($store->active)
                            <input hidden name="active" />
                            <button class="uppercase px-4 py-1 text-xs text-white bg-yellow-400 rounded"
                                type="submit">Deactivate</button>
                        @else
                            <input value="true" hidden name="active" />
                            <button class="uppercase px-4 py-1 text-xs text-white bg-green-400 rounded"
                                type="submit">Activate</button>
                        @endif
                    </form>

                    <form action="{{ route('stores.destroy', $store) }}" method="post" style="display:inline;">
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
