    @if (editOrCreate() == 'edit')
        {!! Form::hidden('user_id', null, []) !!}
    @endif

    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label @error('nama') class="text-danger" @enderror>Nama @error('nama') | {{ $message }}@enderror</label>
            {!! Form::text('nama', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-12 col-md-6">
            <label @error('nip') class="text-danger" @enderror>NIP @error('nip') | {{ $message }}@enderror</label>
            {!! Form::text('nip', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label @error('email') class="text-danger" @enderror>Email @error('email') | {{ $message }}@enderror</label>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-12 col-md-6">
            <label @error('username') class="text-danger" @enderror>Username @error('username') | {{ $message }}@enderror</label>
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label @error('umur') class="text-danger" @enderror>Umur @error('umur') | {{ $message }} @enderror</label>
            {!! Form::number('umur', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-12 col-md-6">
            <label @error('no_hp') class="text-danger" @enderror>No. Telepon @error('no_hp') | {{ $message }} @enderror</label>
            {!! Form::text('no_hp', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row mt-3">
        <div class="form-group col-12 col-md-6">
            <label>Jenis Kelamin</label>
            {!! Form::select('jk', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-12 col-md-6">
            {{-- [1 => 'Golongan 1', 2 => 'Golongan 2', 3 => 'Golongan 3', 4 => 'Golongan 4'] --}}
            <label @error('golongan') class="text-danger" @enderror>Golongan @error('golongan') | {{ $message }} @enderror</label>
            {!! Form::select('id_gaji', getGolongan(), null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-12 col-md-6">
            <label @error('password') class="text-danger" @enderror>Password @error('password') | {{ $message }} @enderror</label>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-12 col-md-6">
            <label>Password Confirmation</label>
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row mt-3">
        <div class="form-group col-12 col-md-6">
            <label @error('alamat') class="text-danger" @enderror>Alamat @error('alamat') | {{ $message }} @enderror</label>
            {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-12 col-md-6">
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

                @if(Request::is('*/tambah'))
                    options = {
                        acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                        maxFileSize: '500KB'
                    }
                @else
                    imageUrl = "{{asset('images/'.$pegawai->foto)}}"
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
