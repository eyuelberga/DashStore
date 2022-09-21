<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <x-slot name="action">
        <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ route('users.create') }}">Add Admin</a>
    </x-slot>
    <x-alert-validation-errors class="mb-4" :errors="$errors" />
    <x-data-table :headers="['Name', 'Email', 'Role', 'Actions']">
        @foreach ($users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    @if ($user->is_admin)
                        ADMIN
                    @else
                        CLIENT
                    @endif
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    @can('delete', $user)
                        <form action="{{ route('users.destroy', $user) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="uppercase px-4 py-1 text-xs text-white bg-red-400 rounded"
                                type="submit">Delete</button>
                        </form>
                        @canBeImpersonated($user, $guard = null)
                        <a class="uppercase px-4 py-1 text-xs text-white bg-yellow-400 rounded"
                            href="{{ route('impersonate', $user->id) }}">Login as user</a>
                        @endCanBeImpersonated
                    @endcan
                </td>

            </tr>
        @endforeach
    </x-data-table>
</x-app-layout>
