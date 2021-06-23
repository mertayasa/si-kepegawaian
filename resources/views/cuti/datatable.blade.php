@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables_jquery/datatables.css')}}">
@endpush

<div class="table-responsive">
    <table class="table table-striped table-hover" id="cutiDatatable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Pegawai</th>
                <th>Status</th>
                <th><span style="display: inline-block; width: 150px;">Dari Tanggal</span></th>
                <th><span style="display: inline-block; width: 150px;">Smpai Tanggal</span></th>
                <th><span style="display: inline-block; width: 150px;">Alasan</span></th>
                <th><span style="display: inline-block; width: 150px;">Aksi</span></th>
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
    let url = "{{ route('cuti.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#cutiDatatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            
            columns: [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'pegawai.user.nama', name: 'pegawai.user.nama'},
                {data: 'status', name: 'status', orderable: false, searchable: false},
                {data: 'dari_tgl', name: 'dari_tgl'},
                {data: 'sampai_tgl', name: 'sampai_tgl'},
                {data: 'alasan', name: 'alasan', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            columnDefs: [
                {
                    targets:  '_all',
                    className: 'align-middle'
                },
                { 
                    responsivePriority: 1, targets: 6
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