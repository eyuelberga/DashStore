@props(['store'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $store->name }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <style>
        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }
    </style>
</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    @auth
        @include('layouts.navigation')
    @endauth
    <!--Nav-->
    <nav id="header" class="w-full z-30 top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle" />

            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-2" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                        @foreach ($store->categories()->where('visible', true)->get() as $category)
                            <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
                                    href="{{ route('storefront.category', ['store' => $store, 'category' => $category]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>

            <div class="order-1 md:order-1">
                <a class="flex  items-center tracking-wide no-underline hover:no-underline font-bold text-indigo-800 text-xl "
                    href="{{ route('storefront.index', $store) }}">
                    {{ $store->name }}
                </a>
                <p class="text-sm"> {{ $store->tagline }}
                <p>
            </div>

            <div class="order-2 md:order-3 flex items-center" id="nav-content">
                <x-mini-cart-dropdown :store="$store" />
            </div>
        </div>
    </nav>
    <div class="px-6">
        <x-alert-success-dismissable :success="session('success')" />
    </div>
    <div class="min-h-screen">
        <section class="bg-white py-8">
            {{ $slot }}
        </section>
    </div>

    <footer class="bg-white p-2 border-t border-gray-400">

        <div class="w-full md:w-1/3 mx-auto text-center">

            <a class="no-underline hover:no-underline font-bold" href="/">
                <img src="/logo.png" class="mx-auto" style="width: 50%;"  />
            </a>
            <h3 class="font-bold text-gray-900">{{ $store->name }}</h3>
            <p class="py-2">
                {{ $store->tagline }}
            </p>



        </div>

    </footer>

</body>

</html>
