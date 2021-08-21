    {{-- {!! Form::hidden('pegawai_nip', Auth::user()->pegawai->nip, []) !!}

    <div class="form-group">
        <label @error('pegawai_nip') class="text-danger" @enderror>Nama Pegawai @error('pegawai_nip') | {{ $message }}@enderror</label>
        {!! Form::text('pegawai_name', Auth::user()->, [$options]) !!}
    </div> --}}

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label @error('no_surat') class="text-danger" @enderror>Nomor Surat @error('no_surat') | {{ $message }}@enderror</label>
                {!! Form::text('no_surat', null, ['class' => 'form-control']) !!}
            </div>
        
            <div class="form-group">
                <label @error('tgl_surat') class="text-danger" @enderror>Tanggal Surat @error('tgl_surat') | {{ $message }}@enderror</label>
                {!! Form::date('tgl_surat', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="col-12 p-0">
                    <label @error('foto') class="text-danger" @enderror>Foto @error('foto') | {{ $message }} @enderror</label>
                    {!! Form::file('foto', ['class' => 'd-block filepond', 'id' => 'foto']) !!}
                </div>
            </div>
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