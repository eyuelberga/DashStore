 @props(['success'])
 @if (isset($success))
     <div id="alertDismissable"
         class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show"
         role="alert">

         {{ $success }}
         <button onclick="toggleHidden('alertDismissable')" id="closeBtn" type="button"
             class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900 hover:opacity-75 hover:no-underline"
             data-bs-dismiss="alert" aria-label="Close">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                 <path fill-rule="evenodd"
                     d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                     clip-rule="evenodd" />
             </svg>
         </button>
     </div>
     <script>
         /*Toggle dropdown list*/
         function toggleHidden(id) {
             document.getElementById(id).classList.toggle("hidden");
         }
     </script>
 @endif
