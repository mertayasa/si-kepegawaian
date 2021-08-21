    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group col-12 ">
                <label @error('pegawai_nip') class="text-danger" @enderror>Nama Pegawai @error('pegawai_nip') | {{ $message }}@enderror</label>
                {!! Form::select('pegawai_nip', $pegawai, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-12 ">
                <label @error('keterangan') class="text-danger" @enderror>Keterangan @error('keterangan') | {{ $message }}@enderror</label>
                {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group col-12 ">
                <label @error('surat_sanksi') class="text-danger" @enderror>Surat Sanksi @error('surat_sanksi') | {{ $message }} @enderror</label>
                {!! Form::file('surat_sanksi', ['class' => 'd-block filepond', 'id' => 'foto']) !!}
            </div>
        </div>

    
        {{-- <div class="form-group col-12 col-md-6">
            <label @error('golongan') class="text-danger" @enderror>Golongan @error('golongan') | {{ $message }}@enderror</label>
            {!! Form::text('golongan', null, ['class' => 'form-control']) !!}
        </div> --}}
    </div>

    {{-- <div class="row">
        <div class="form-group col-12 col-md-6">
            <label @error('jabatan') class="text-danger" @enderror>Jabatan @error('jabatan') | {{ $message }}@enderror</label>
            {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
        </div>
    </div> --}}

    {{-- <div class="row">
        <div class="form-group col-12 col-md-6">
            <label @error('keterangan') class="text-danger" @enderror>Keterangan @error('keterangan') | {{ $message }}@enderror</label>
            {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
        </div>
    </div> --}}

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                FilePond.registerPlugin(
                    FilePondPluginFileEncode,
                    FilePondPluginFileValidateSize,
                    FilePondPluginFileValidateType,
                    FilePondPluginImageExifOrientation,
                    FilePondPluginImagePreview
                );

                let options
                let imageUrl
                const url = window.location

                @if(Request::is('*/create'))
                    options = {
                        acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                        maxFileSize: '500KB'
                    }
                @else
                    imageUrl = "{{asset('images/'.$sanksi->surat_sanksi)}}"
                    options = {
                        acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                        maxFileSize: '500KB',
                        files: [{
                            source: imageUrl,
                            options:{
                                    type: 'remote'
                            }
                        }],
                    }
                @endif

                if(url.pathname.includes('tambah')){
                    
                }else{
                    
                }

                FilePond.create(
                    document.getElementById('foto'), options
                );
            })
        </script>
    @endpush