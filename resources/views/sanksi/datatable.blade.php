@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables_jquery/datatables.css')}}">
@endpush

<div class="table-responsive">
    <table class="table table-striped table-hover" id="sanksiDatatable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Surat Keterangan</th>
                <th><span style="display: inline-block; width: 150px;">Pegawai</span></th>
                <th><span style="display: inline-block; width: 150px;">Golongan</span></th>
                <th><span style="display: inline-block; width: 150px;">Jabatan</span></th>
                <th><span style="display: inline-block; width: 150px;">Keterangan</span></th>
                @if(userRole() == 'admin')
                    <th>Aksi</th>
                @endif
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
    let url = "{{ route('sanksi.datatable') }}"

    datatable(url)
    function datatable (url){

        let columns =  [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'surat_sanksi', name: 'surat_sanksi'},
                {data: 'pegawai.user.nama', name: 'pegawai.user.nama'},
                {data: 'golongan', name: 'golongan'},
                {data: 'jabatan', name: 'jabatan'},
                {data: 'keterangan', name: 'keterangan'},
            ]

        @if(userRole() == 'admin')
            column.push({data: 'action', name: 'action', orderable: false, searchable: false})
        @endif

        table = $('#sanksiDatatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            
            columns: columns,
            columnDefs: [
                {
                    targets:  '_all',
                    className: 'align-middle'
                },
                { 
                    responsivePriority: 1, targets: 5
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