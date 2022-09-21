<x-store-layout :store="$store">
    <div class="container text-center justify-center mx-auto flex items-center flex-wrap pt-4 pb-12">
        <x-alert-success>
            <x-slot name="success">
                <h4 class="text-2xl font-medium leading-tight mb-2">Your Order has been Sent!</h4>
                <p class="mb-4">
                    Thank you for Shopping! Your Order code is: {{ $order->id }}
                </p>
                <hr class="border-green-600 opacity-30">
                <p class="mt-4 mb-0">
                    Note: It might take 3-6 weeks for your order to arrive.
                </p>
    </div>
    </x-slot>
    </x-alert-success>
    </div>

</x-store-layout>
