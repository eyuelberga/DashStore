<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Category') }}
        </h2>
    </x-slot>


    <x-alert-validation-errors class="mb-4" :errors="$errors" />

    <form method="post" action="{{ route('categories.update', $category) }}">

        @csrf
        @method('PATCH')
        <div>
            <x-label for="name" :value="__('Category Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name" required autofocus />
        </div>

        <div class="block mt-4">
            <label for="hide" class="inline-flex items-center">
                <input id="hide" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="hide" @if ($category->visible == 0) checked @endif>
                <span class="ml-2 text-sm text-gray-600">{{ __('Hide from Navbar') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Update') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
