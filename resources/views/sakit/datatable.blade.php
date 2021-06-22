@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables_jquery/datatables.css')}}">
@endpush

<div class="table-responsive">
    <table class="table table-striped table-hover" id="suratDatatable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th><span style="display: inline-block; width: 150px;">No Surat</span></th>
                <th><span style="display: inline-block; width: 150px;">Pegawai</span></th>
                <th>Tanggal Surat</th>
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
    let url = "{{ route('surat.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#suratDatatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            
            columns: [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'foto', name: 'foto'},
                {data: 'no_surat', name: 'no_surat'},
                {data: 'pegawai.nama', name: 'pegawai.nama'},
                {data: 'tgl_surat', name: 'tgl_surat'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
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