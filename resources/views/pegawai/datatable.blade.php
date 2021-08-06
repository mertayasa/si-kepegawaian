@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables_jquery/datatables.css')}}">
@endpush

<div class="table-responsive">
    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th><span style="display: inline-block; width: 150px;">Nama</span></th>
                <th>NIP</th>
                <th>Golongan</th>
                <th>No.Telp</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th><span style="display: inline-block; width: 150px;">Alamat</span></th>
                <th>Aksi</th>
                <th></th>
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
    let url = "{{ route('pegawai.datatable') }}"

    datatable(url)
    function datatable (url){

        table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: url,
            order: [10, 'DESC'],
            columns: [
                {data: 'DT_RowIndex', name: 'no',orderable: false, searchable: false},
                {data: 'foto', name: 'foto', orderable: false, searchable: false},
                {data: 'user.nama', name: 'user.nama', orderable: false},
                {data: 'nip', name: 'nip', orderable: false},
                {data: 'golongan', name: 'golongan', orderable: false},
                {data: 'no_hp', name: 'no_hp', orderable: false},
                {data: 'umur', name: 'umur'},
                {data: 'jk', name: 'jk', orderable: false},
                {data: 'alamat', name: 'alamat', orderable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'created_at', name: 'created_at', visible:false}
            ],
            columnDefs: [
                {
                    targets:  '_all',
                    className: 'align-middle'
                },
                { 
                    responsivePriority: 1, targets: 9
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