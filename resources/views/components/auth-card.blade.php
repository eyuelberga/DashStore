<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-50 overflow-hidden border-2 border-gray-400" style="box-shadow: 5px 5px rgb(251 146 60);">
        {{ $slot }}
    </div>
</div>
