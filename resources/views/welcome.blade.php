<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
</head>

<style>
    .icon-shadow {
        box-shadow: 5px 5px rgb(249 115 22);
    }
</style>

<body class="leading-normal tracking-normal text-gray-800" style="font-family: 'Source Sans Pro', sans-serif;">


    <!--Nav-->
    <nav class="fixed w-full z-30 top-0 text-gray-800 bg-white shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="text-gray-800 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">

                    <img src="/logo_sm.png" class="w-12" />
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-indigo-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">

                    @if (Route::has('login'))
                        @auth
                            <li class="mr-3">
                                <a href="{{ url('/dashboard') }}"
                                    class="inline-block px-7 py-3 mr-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Dashboard</a>
                            </li>
                        @else
                            <li class="mr-3">
                                <a href="{{ route('login') }}"
                                    class="inline-block px-7 py-3 bg-transparent text-blue-600 font-medium text-sm leading-snug uppercase rounded hover:text-blue-700 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-0 active:bg-gray-200 transition duration-150 ease-in-out">Log
                                    in</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="mr-3">
                                    <a href="{{ route('register') }}"
                                        class="inline-block px-7 py-3 mr-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>



    <!-- Section: Design Block -->
    <section class="mb-40">


        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
            class="svg absolute hidden lg:block" style="height: 560px; width: 100%; z-index: -10; overflow: hidden">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="hsl(217, 102%, 99%)" offset="0%"></stop>
                    <stop stop-color="hsl(217,88%, 93%)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path fill="url(#sw-gradient-0)"
                d="M 0.351 264.418 C 0.351 264.418 33.396 268.165 47.112 270.128 C 265.033 301.319 477.487 325.608 614.827 237.124 C 713.575 173.504 692.613 144.116 805.776 87.876 C 942.649 19.853 1317.845 20.149 1440.003 23.965 C 1466.069 24.779 1440.135 24.024 1440.135 24.024 L 1440 0 L 1360 0 C 1280 0 1120 0 960 0 C 800 0 640 0 480 0 C 320 0 160 0 80 0 L 0 0 L 0.351 264.418 Z">
            </path>
        </svg>

        <div class="px-6 py-12 lg:my-12 md:px-12 text-gray-800 text-center">
            <div class="container mx-auto xl:px-32">
                <div class="grid lg:grid-cols-2 gap-12 flex items-center">
                    <div class="mt-12 lg:mt-0">
                        <img src="/logo.png" class="w-full mb-4" alt="Dash Store" />
                        <h1 class=" text-xl md:text-2xl xl:text-3xl font-bold tracking-tight mb-12">
                            Launch your
                            Storefront
                            <br /><span class="text-blue-600">in Seconds!</span>
                        </h1>
                        <a class="inline-block px-7 py-3 mr-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                            href="{{ url('/dashboard') }}" role="button">Get
                            started</a>
                    </div>
                    <div class="mb-12 lg:mb-0">
                        <img src="https://images.unsplash.com/photo-1472851294608-062f824d29cc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                            class="w-full rounded-lg shadow-lg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->


    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800 text-center">
        <h2 class="text-3xl font-bold mb-20">Why is it so great?</h2>

        <div class="grid lg:gap-x-12 lg:grid-cols-3">
            <div class="mb-12 lg:mb-0">
                <div class="rounded-lg shadow-lg h-full block bg-white">
                    <div class="flex justify-center">
                        <div class="p-4 bg-yellow-300 inline-block -mt-8 icon-shadow">
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm14.25 6a.75.75 0 01-.22.53l-2.25 2.25a.75.75 0 11-1.06-1.06L15.44 12l-1.72-1.72a.75.75 0 111.06-1.06l2.25 2.25c.141.14.22.331.22.53zm-10.28-.53a.75.75 0 000 1.06l2.25 2.25a.75.75 0 101.06-1.06L8.56 12l1.72-1.72a.75.75 0 10-1.06-1.06l-2.25 2.25z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="text-lg font-semibold mb-4">It's Open-Source</h5>
                        <p>
                            The entire source-code is avaliable on <a class="text-blue-600"
                                href="https://github.com/eyuelberga/DashStore">GitHub</a>. You can modify it any way you
                            like.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-12 lg:mb-0">
                <div class="rounded-lg shadow-lg h-full block bg-white">
                    <div class="flex justify-center">
                        <div class="p-4 bg-yellow-300 inline-block -mt-8 icon-shadow">
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M505.12019,19.09375c-1.18945-5.53125-6.65819-11-12.207-12.1875C460.716,0,435.507,0,410.40747,0,307.17523,0,245.26909,55.20312,199.05238,128H94.83772c-16.34763.01562-35.55658,11.875-42.88664,26.48438L2.51562,253.29688A28.4,28.4,0,0,0,0,264a24.00867,24.00867,0,0,0,24.00582,24H127.81618l-22.47457,22.46875c-11.36521,11.36133-12.99607,32.25781,0,45.25L156.24582,406.625c11.15623,11.1875,32.15619,13.15625,45.27726,0l22.47457-22.46875V488a24.00867,24.00867,0,0,0,24.00581,24,28.55934,28.55934,0,0,0,10.707-2.51562l98.72834-49.39063c14.62888-7.29687,26.50776-26.5,26.50776-42.85937V312.79688c72.59753-46.3125,128.03493-108.40626,128.03493-211.09376C512.07526,76.5,512.07526,51.29688,505.12019,19.09375ZM384.04033,168A40,40,0,1,1,424.05,128,40.02322,40.02322,0,0,1,384.04033,168Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="text-lg font-semibold mb-4">Easy to get started</h5>
                        <p>
                            It's super easy to create and manage your storefront. You can have a fully functional
                            storefront in seconds!
                        </p>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="rounded-lg shadow-lg h-full block bg-white">
                    <div class="flex justify-center">
                        <div class="p-4 bg-yellow-300 inline-block -mt-8 icon-shadow">
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="w-6 h-6">
                                <path
                                    d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 007.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 004.902-5.652l-1.3-1.299a1.875 1.875 0 00-1.325-.549H5.223z" />
                                <path fill-rule="evenodd"
                                    d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 009.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 002.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3zm3-6a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v3a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-3zm8.25-.75a.75.75 0 00-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-5.25a.75.75 0 00-.75-.75h-3z"
                                    clip-rule="evenodd" />
                            </svg>



                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="text-lg font-semibold mb-4">Order and Inventory management</h5>
                        <p>
                            Dash Store helps you manage your orders and inventory
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->





    <!--Footer-->
    <footer class="bg-white">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 mr-6 text-black">
                    <a class="text-indigo-600 no-underline hover:no-underline font-bold" href="#">
                        <img src="/logo.png" class="w-full" />
                    </a>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Terms</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Facebook</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Linkedin</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Company</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Official
                                Blog</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">About
                                Us</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-indigo-500">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>

    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
</body>

</html>
