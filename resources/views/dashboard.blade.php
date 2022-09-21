<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if ((Auth::user()->is_admin && session()->get('client_view')) || !Auth::user()->is_admin)
        @if (!Auth::user()->store->active)
            <x-alert-error>
                <x-slot name="error">
                    <h4 class="text-lg font-medium leading-tight mb-2">Your Store has been Deactivated!</h4>
                    <p class="mb-4">
                        The Admin has suspended your storefront. It will not be avaliable to the public.
                    </p>
                    <hr class="border-red-600 opacity-30">
                    <p class="mt-4 mb-0">
                        Please contact support for more details.
                    </p>
                    </div>
                </x-slot>
            </x-alert-error>
        @else
            <div>
                <div class="flex flex-wrap">
                    <x-stat-card name="New Orders" :value="Auth::user()
                        ->store->orders()
                        ->where('status', 'ordered')
                        ->count()">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </x-slot>
                    </x-stat-card>
                    <x-stat-card name="Products" :value="Auth::user()
                        ->store->products()
                        ->count()">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </x-slot>
                    </x-stat-card>
                    <x-stat-card name="Categories" :value="Auth::user()
                        ->store->categories()
                        ->count()">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </x-slot>
                    </x-stat-card>
                </div>
                <div class="flex justify-center text-center">
                    @php
                        $ordered = Auth::user()
                            ->store->orders()
                            ->where('status', 'ordered')
                            ->count();
                        $paid = Auth::user()
                            ->store->orders()
                            ->where('status', 'paid')
                            ->count();
                        $shipped = Auth::user()
                            ->store->orders()
                            ->where('status', 'shipped')
                            ->count();
                        $delivered = Auth::user()
                            ->store->orders()
                            ->where('status', 'delivered')
                            ->count();
                    @endphp
                    <x-pie-chart id="orders" title="Orders" labels='["Ordered", "Paid", "Shipped", "Delivered" ]'
                        datasets='[{ label: "Users", data: [{{ $ordered }}, {{ $paid }}, {{ $shipped }}, {{ $delivered }}], backgroundColor: ["gold", "orange", "lightblue", "lime"],hoverOffset: 4,}, ]' />
                </div>
            </div>
        @endif
    @else
        <div>
            <div class="flex flex-wrap">
                <x-stat-card name="Total Stores" :value="$total_stores">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </x-slot>
                </x-stat-card>
                <x-stat-card name="Active Stores" :value="$active_stores">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                clip-rule="evenodd" />
                        </svg>
                    </x-slot>
                </x-stat-card>
                <x-stat-card name="Admins" :value="$admins">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </x-slot>
                </x-stat-card>
            </div>
            <div class="flex justify-center gap-6 lg:gap-12 text-center">

                <x-pie-chart id="stores" title="Stores" labels='["Active", "Inactive" ]'
                    datasets='[{ label: "Stores", data: [{{ $active_stores }}, {{ $total_stores - $active_stores }}], backgroundColor: [ "orange","lightblue",],hoverOffset: 4,}, ]' />


                <x-pie-chart id="users" title="Users" labels='["Admins", "Clients" ]'
                    datasets='[{ label: "Users", data: [{{ $admins }}, {{ $clients }}], backgroundColor: [ "gold","indianred",],hoverOffset: 4,}, ]' />
            </div>
        </div>
    @endif
</x-app-layout>
