<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Store Settings') }}
        </h2>
    </x-slot>


    <x-alert-validation-errors class="mb-4" :errors="$errors" />

    <form method="post" action="{{ route('stores.update', $store) }}">

        @csrf
        @method('PATCH')
        <div>
            <x-label for="name" :value="__('Store Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$store->name" required autofocus />
        </div>

        <div class="block mt-2">
            <x-label for="name" :value="__('Tagline')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="tagline" :value="$store->tagline" autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Update Store') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
