@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Gaji</h1>
    </div>
    <p><strong><a href="{{route('gaji.index')}}" class='text-decoration-none text-gray-900'>Dashboard</a></strong> / Data gaji</p>
    <!-- Area Table -->
    @include('layouts.flash')
    <div class="col-12 p-0">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                @include('gaji.datatable')
            </div>
        </div>
    </div>

    <div class="modal fade" id="gajiModal" tabindex="-1" role="dialog" aria-labelledby="gajiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gajiModalLabel">Update Data Gaji</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::hidden('id', null, ['id' => 'inputId']) !!}
                <label class="text-secondary">Golongan</label>
                {!! Form::text('golongan', null, ['class' => 'form-control mb-3', 'disabled' => true, 'id' => 'inputGolongan']) !!}

                <label class="text-secondary">Jabatan</label>
                {!! Form::text('jabatan', null, ['class' => 'form-control mb-3', 'disabled' => true, 'id' => 'inputJabatan']) !!}

                <label class="text-secondary">Gaji</label>
                {!! Form::number('gaji', null, ['class' => 'form-control', 'id' => 'inputGaji']) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="submitData()">Update</button>
            </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script> 
        function populateModal(element){
            const gaji = document.getElementById('inputGaji').value = element.getAttribute('data-gaji')
            const golongan = document.getElementById('inputGolongan').value = element.getAttribute('data-golongan')
            const jabatan = document.getElementById('inputJabatan').value = element.getAttribute('data-jabatan')
            const id = document.getElementById('inputId').value = element.getAttribute('data-id')
        }

        function submitData(){
            let dataId = document.getElementById('inputId').value
            let dataGaji = document.getElementById('inputGaji').value

            Swal.fire({
                title: "Warning",
                text: "Yakin mengubah data gaji?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#169b6b',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : "{{url('gaji/update')}}" + '/' + dataId,
                        dataType : "Json",
                        data : {"_token": "{{ csrf_token() }}", "gaji": dataGaji},
                        method : "get",
                        success:function(data){
                            if(data.code == 1){
                                Swal.fire(
                                    'Berhasil',
                                    data.message,
                                    'success'
                            )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.message
                                })
                            }
                            $('#gajiDatatable').DataTable().ajax.reload();
                            $('#gajiModal').modal('hide');
                        }
                    })
                }
            })
        }
    </script>
@endpush