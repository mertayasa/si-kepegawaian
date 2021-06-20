    <div class="form-group">
        <label @error('pegawai_id') class="text-danger" @enderror>Nama Pegawai @error('pegawai_id') | {{ $message }}@enderror</label>
        {!! Form::select('pegawai_id', $pegawai, isset($surat) ? $surat->pegawai_id : null, ['class' => 'form-control init-select2']) !!}
    </div>

    <div class="form-group">
        <label @error('no_surat') class="text-danger" @enderror>Nomor Surat @error('no_surat') | {{ $message }}@enderror</label>
        {!! Form::text('no_surat', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <label @error('tgl_surat') class="text-danger" @enderror>Tanggal Surat @error('tgl_surat') | {{ $message }}@enderror</label>
        {!! Form::date('tgl_surat', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <div class="col-6 p-0">
            <label @error('foto') class="text-danger" @enderror>Foto @error('foto') | {{ $message }} @enderror</label>
            {!! Form::file('foto', ['class' => 'd-block filepond', 'id' => 'foto']) !!}
        </div>
    </div>

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
                    imageUrl = "{{asset('images/'.$surat->foto)}}"
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