 @props(['store'])
 <style>
    
     .dropdown {
         position: relative;
         display: inline-block;
     }

   
     .dropdown-content {
         display: none;
         position: absolute;
         background-color: #f1f1f1;
         min-width: 250px;
         right: 2px;
         box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
         z-index: 10000;
     }


     .dropdown-content a {

         padding: 12px 16px;
         text-decoration: none;
         display: block;
     }

     .dropdown-show {
         display: block;
     }
 </style>
 <div class="dropdown">
     <button onclick="toggleCartDropdown()"
         class="dropbtn ml-3 p-4 bg-gray-100 rounded-full hover:bg-gray-200 inline-block no-underline hover:text-black">
         <div slot="icon" class="relative dropbtn">
             <div
                 class="dropbtn absolute text-xs rounded-full -mt-1 -mr-2 px-1 font-bold top-0 right-0 bg-red-700 text-white">
                 @if (session()->get('cart-' . $store->id))
                     {{ count(session()->get('cart-' . $store->id)) }}
                 @else
                     0
                 @endif
             </div>
             <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="dropbtn feather feather-shopping-cart w-6 h-6 mt-2">
                 <circle cx="9" cy="21" r="1"></circle>
                 <circle cx="20" cy="21" r="1"></circle>
                 <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
             </svg>
         </div>
     </button>
     <div id="myDropdown" class="dropdown-content">
         <div class="shadow-xl w-64">
             @if (session()->get('cart-' . $store->id))
                 @foreach (session()->get('cart-' . $store->id) as $id => $product)
                     <div class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100"
                         style="">
                         <div class="p-2 w-12"></div>
                         <div class="flex-auto text-sm w-32">
                             <div class="font-bold"> {{ $product['name'] }}</div>
                             <div class="truncate">${{ $product['price'] }}</div>
                             <div class="text-gray-400">Qt: {{ $product['qty'] }}</div>
                         </div>
                         <div class="flex flex-col w-18 font-medium items-end">
                             <form action="{{ route('storefront.remove_cart', ['store' => $store, 'id' => $id]) }}"
                                 method="post" style="display:inline;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit"
                                     class="inline w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-trash-2 ">
                                         <polyline points="3 6 5 6 21 6"></polyline>
                                         <path
                                             d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                         </path>
                                         <line x1="10" y1="11" x2="10" y2="17"></line>
                                         <line x1="14" y1="11" x2="14" y2="17"></line>
                                     </svg>
                                 </button>

                             </form>
                             ${{ $product['price'] * $product['qty'] }}
                         </div>
                     </div>
                 @endforeach
             @endif



             <div class="p-4 justify-center flex">
                 <a href="{{ route('storefront.cart', $store) }}"
                     class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out text-center w-full">
                     View Cart</a>
             </div>
             @if (session()->get('cart-' . $store->id))
                 <div class="p-4 justify-center flex">

                     <a href="{{ route('storefront.checkout', $store) }}"
                         class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out text-center w-full">Checkout
                         ${{ array_reduce(session()->get('cart-' . $store->id), fn($carry, $product) => ($carry += $product['price'] * $product['qty']), 0) }}</a>

                 </div>
             @endif
         </div>
     </div>

     <script>
         /* When the user clicks on the button,
                                                            toggle between hiding and showing the dropdown content */
         function toggleCartDropdown() {
             document.getElementById("myDropdown").classList.toggle("dropdown-show");
         }

         // Close the dropdown menu if the user clicks outside of it
         window.onclick = function(event) {
             if (!event.target.matches('.dropbtn')) {
                 var dropdowns = document.getElementsByClassName("dropdown-content");
                 var i;
                 for (i = 0; i < dropdowns.length; i++) {
                     var openDropdown = dropdowns[i];
                     if (openDropdown.classList.contains('dropdown-show')) {
                         openDropdown.classList.remove('dropdown-show');
                     }
                 }
             }
         }
     </script>
