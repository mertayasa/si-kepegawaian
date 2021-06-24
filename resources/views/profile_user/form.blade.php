@if (userRole() == 'admin')
<div class="row">
    <div class="col-12 pb-3 pb-md-0">
        {!! Form::label('username', 'Username', ['class' => 'mb-1']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'username']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('email', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('password', 'Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('PasswordConfirmation', 'Password Confirmation', ['class' => 'mb-1']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'PasswordConfirmation']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('no_hp', 'No. Telepon', ['class' => 'mb-1']) !!}
        {!! Form::text('no_hp', null, ['class' => 'form-control', 'id' => 'no_hp']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('alamat', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamat']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('foto', 'Foto', ['class' => 'mb-1']) !!}
        {!! Form::file('foto', ['class' => 'd-block filepond', 'id' => 'foto']) !!}
    </div>
</div>
@endif

@if (userRole() == 'pegawai')
<div class="row">
    <div class="col-12 pb-3 pb-md-0">
        {!! Form::label('nama', 'Nama', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('username', 'Username', ['class' => 'mb-1']) !!}
        {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('email', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('password', 'Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('PasswordConfirmation', 'Password Confirmation', ['class' => 'mb-1']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'PasswordConfirmation']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('no_hp', 'No. Telepon', ['class' => 'mb-1']) !!}
        {!! Form::text('no_hp', null, ['class' => 'form-control', 'id' => 'no_hp']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('umur', 'Umur', ['class' => 'mb-1']) !!}
        {!! Form::number('umur', null, ['class' => 'form-control', 'id' => 'umur']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('jk', 'Jenis Kelamin', ['class' => 'mb-1']) !!}
        {!! Form::select('jk', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('golongan', 'Golongan', ['class' => 'mb-1']) !!}
        {!! Form::select('golongan', [1 => 'Golongan 1', 2 => 'Golongan 2', 3 => 'Golongan 3', 4 => 'Golongan 4'], null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('alamat', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'style' => 'height:150px']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('foto', 'Foto', ['class' => 'mb-1']) !!}
        {!! Form::file('foto', ['class' => 'd-block filepond', 'id' => 'foto']) !!}
    </div>
</div>
@endif

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


                    options = {
                        acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                        maxFileSize: '500KB'
                    }


                if(url.pathname.includes('tambah')){

                }else{

                }

                FilePond.create(
                    document.getElementById('foto'), options
                );
            })
        </script>
    @endpush

