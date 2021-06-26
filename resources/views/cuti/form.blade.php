    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group col-12">
                <label @error('pegawai_id') class="text-danger" @enderror>Nama Pegawai @error('pegawai_id') | {{ $message }}@enderror</label>
                {!! Form::text('pegawai_id', Auth::user()->nama, ['class' => 'form-control', 'readonly' => true]) !!}
            </div>
        
            <div class="form-group col-12">
                <label @error('dari_tgl') class="text-danger" @enderror>Dari Tanggal @error('dari_tgl') | {{ $message }}@enderror</label>
                {!! Form::date('dari_tgl', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-12 ">
                <label @error('sampai_tgl') class="text-danger" @enderror>Sampai Tanggal @error('sampai_tgl') | {{ $message }}@enderror</label>
                {!! Form::date('sampai_tgl', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row">
                <div class="form-group col-12">
                    <label @error('alasan') class="text-danger" @enderror>Alasan @error('alasan') | {{ $message }} @enderror</label>
                    {!! Form::textarea('alasan', null, ['class' => 'form-control']) !!}
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