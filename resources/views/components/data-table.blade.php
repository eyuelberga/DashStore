@props(['headers'])
<div>
    <table id="dataTable" class="min-w-full my-4">
        <thead class="bg-gray-50">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="text-xs font-bold text-gray-900 px-6 py-4 text-left">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#dataTable').DataTable({
                    responsive: true
                })
                .columns.adjust()
           
        });
    </script>
</div>
