@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables_jquery/datatables.css')}}">
@endpush

<div class="table-responsive">
    <table class="table table-striped table-hover" id="sakitDatatable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Surat Keterangan</th>
                <th><span style="display: inline-block; width: 150px;">Pegawai</span></th>
                <th><span style="display: inline-block; width: 150px;">Tanggal</span></th>
                <th><span style="display: inline-block; width: 150px;">Alasan</span></th>
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
    let url = "{{ route('sakit.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#sakitDatatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            
            columns: [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'surat_ket', name: 'surat_ket'},
                {data: 'pegawai.user.nama', name: 'pegawai.user.nama'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'alasan', name: 'alasan'},
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