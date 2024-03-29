@include('layouts.header')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">REGISTER</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <div class="form-group">

                                            <input type="name" class="form-control @error('nama') is-invalid @enderror form-control-user"
                                            name="nama" value="{{ old('nama') }}" required autocomplete="name" id="name" autofocus placeholder="Nama" >
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">

                                            <input type="text" class="form-control @error('username') is-invalid @enderror form-control-user"
                                            name="username" value="{{ old('username') }}" required autocomplete="username" id="username" placeholder="Username" >
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">



                                            <input type="email" class="form-control @error('email') is-invalid @enderror form-control-user"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" id="email" autofocus placeholder="Email" >

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-user"
                                            name="password" required autocomplete="password" id="password" autofocus placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">



                                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-user"
                                            name="password_confirmation" required autocomplete="new-password" id="password-confirm" placeholder="Konfirmasi Password">

                                        </div>
                                        <br>


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                                              Register
                                            </button>
                                        </div>

                                    </form>
                                     <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@include('layouts.alert_logout')
@include('layouts.scripts')

</body>

</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; font-size:15px;">{{ __('Register Pegawai') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <br><br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
