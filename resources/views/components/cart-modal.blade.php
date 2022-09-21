 @props(['store'])
 <div>
     <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
         <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
             <div class="fixed inset-0 transition-opacity">
                 <div class="absolute inset-0 bg-gray-900 opacity-75" />
             </div>

             <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
             <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                 <div class="bg-gray-50 px-4 py-3">
                     <h5 class="text-xl font-medium leading-normal text-gray-800 " id="modalTitle">Product title</h5>
                 </div>
                 <form method="post" action="{{ route('storefront.add_cart', $store) }}">
                     @csrf
                     <div class="md:grid md:grid-cols-3 md:gap-6">
                         <div class="md:col-span-1">
                             <div class="py-6 px-4 sm:px-6 lg:px-8 ">
                                 <img id="modalProductImage" class="object-cover w-full">
                             </div>
                         </div>
                         <div class="mt-5 md:mt-0 md:col-span-2">
                             <h3 class="text-lg font-strong p-2 leading-6 text-gray-800" id="modalProductPrice">$0</h3>
                             <p class="mt-2 text-lg text-gray-500 p-2" id="modalProductDescription">description</p>
                             <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" id="form-spot">

                             </div>


                         </div>
                     </div>

                     <div class="bg-gray-200 px-4 py-3 text-right">
                         <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                             onclick="toggleModal()">Close</button>
                         <button type="submit"
                             class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2">Add to
                             Cart</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <script>
     function toggleModal() {
         document.getElementById('modal').classList.toggle('hidden')
     }

     function openModal(product) {
         var args = product.split(',');
         var form = `<div>
                         <input hidden name="id" value="${args[0]}" />
                         <input hidden name="name" value="${args[1]}" />
                         <input hidden name="price" value="${args[2]}" />
                       <div class="mt-6 p-2 bg-gray-50">
                          <x-label for="qty" :value="__('Quantity')" />
                            <x-input type=number name="qty" required placeholder="Quantity" value="1" />
                        </div>
                     </div>`
         document.getElementById('modalTitle').innerText = args[1];
         document.getElementById('modalProductPrice').innerText = "$"+args[2];
         document.getElementById('modalProductDescription').innerText = args[3];
         document.getElementById('modalProductImage').src = args[4];
         document.getElementById('form-spot').innerHTML = form;
         document.getElementById('modal').classList.toggle('hidden')
     }
 </script>
