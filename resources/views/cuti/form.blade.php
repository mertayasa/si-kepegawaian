    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group col-12">
                <label>Nama Pegawai</label>
                {!! Form::text('pegawai_id', Auth::user()->nama, ['class' => 'form-control', 'readonly' => true]) !!}
                <small class="text-danger">@error('pegawai_id') {{ $message }}@enderror</small>
            </div>
        
            <div class="form-group col-12">
                <label>Dari Tanggal</label>
                {!! Form::date('dari_tgl', null, ['class' => 'form-control']) !!}
                <small class="text-danger">@error('dari_tgl') {{ $message }}@enderror</small>
            </div>
            <div class="form-group col-12 ">
                <label>Sampai Tanggal</label>
                {!! Form::date('sampai_tgl', null, ['class' => 'form-control']) !!}
                <small class="text-danger">@error('sampai_tgl') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row">
                <div class="form-group col-12">
                    <label>Alasan</label>
                    {!! Form::textarea('alasan', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">@error('alasan') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
    </div>


    {{-- @push('scripts')
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
    @endpush --}}