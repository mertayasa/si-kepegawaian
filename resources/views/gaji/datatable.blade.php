@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables_jquery/datatables.css')}}">
@endpush

<div class="table-responsive">
    <table class="table table-striped table-hover" id="gajiDatatable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Golongan</th>
                {{-- <th>Jabatan</th> --}}
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('scripts')
<script src="{{asset('vendor/datatables_jquery/datatables.min.js')}}"></script>
<script>

    let table
    let url = "{{ route('gaji.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#gajiDatatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            
            // {data: 'pegawai.nama', name: 'pegawai.nama'},
            columns: [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'golongan', name: 'golongan'},
                // {data: 'jabatan', name: 'jabatan'},
                {data: 'gaji', name: 'gaji'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            columnDefs: [
                {
                    targets:  '_all',
                    className: 'align-middle'
                },
                { 
                    responsivePriority: 1, targets: 3
                },
            ],
            language: {
                search: "",
                searchPlaceholder: "Cari"
            },
        });
    }

</script>

@endpush