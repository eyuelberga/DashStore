@props(['name', 'value', 'icon'])
<div class="w-full md:w-1/2 xl:w-1/3 p-6">
    <!--Metric Card-->
    <div class="bg-yellow-50 p-5" style="box-shadow: 5px 5px rgb(251 146 60);">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                @if (isset($icon))
                    <div class="rounded-full p-5">{{ $icon }}</div>
                @endif
            </div>
            <div class="flex-1 text-right md:text-center">
                <h2 class="font-bold uppercase text-gray-600">{{ $name }}</h2>
                <p class="font-bold text-3xl">{{ $value }}</p>
            </div>
        </div>
    </div>
    <!--/Metric Card-->
</div>
