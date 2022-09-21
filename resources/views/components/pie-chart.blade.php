@props(['title', 'labels', 'datasets', 'id'])
<div class="bg-gray-50 border-2 border-gray-400 overflow-hidden" style="box-shadow: 5px 5px rgb(251 146 60);">
    <div class="py-3 px-5 bg-gray-100">{{ $title }}</div>
    <canvas class="p-10" id="{{ $id }}"></canvas>
</div>

<!-- Chart pie -->
<script>
    new Chart(document.getElementById("{{ $id }}"), {
        type: "pie",
        data: {
            labels: {!! $labels !!},
            datasets: {!! $datasets !!}
        },
        options: {},
    });
</script>
