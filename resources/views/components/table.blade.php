@props(['header' => '', 'tableId' => ''])

<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="{{ $tableId }}">
                    <thead>
                        <tr>
                            {{ $header }}
                        </tr>
                    </thead>
                    <tbody>
                        {{ $slot }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        $('#{{ $tableId }}').DataTable();

        // Penambahan kelas ke elemen th dan td
        document.querySelectorAll('#{{ $tableId }} th').forEach(el => el.classList.add("px-6", "py-3",
            "text-left", "text-xs", "font-medium", "text-gray-500", "uppercase"));
        document.querySelectorAll('#{{ $tableId }} td').forEach(el => el.classList.add("px-6", "py-4",
            "whitespace-nowrap", "text-sm", "font-medium", "text-black", "dark:text-gray-200"));
    });
</script>

@stack('scripts')
