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
                                        <h1 class="h4 text-gray-900 mb-4">SISTEM INFORMASI KEPEGAWAIAN KPU PROVINSI BALI</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="form-group">
                                            {{-- <input type="email" class="form-control @error('email') is-invalid @enderror form-control-user"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail"
                                            aria-describedby="emailHelp" autofocus placeholder="Enter Email Address..." >
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}

                                            <input id="exampleInputEmail" type="username" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
    
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-user"
                                            name="password" required autocomplete="current-password" id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                              Login
                                            </button>
                                        </div>

                                    </form>
                                     <br>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        {{-- <a class="small" href="{{ route('register') }}">Create an Account!</a> --}}
                                    </div>
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


{{-- @extends('layouts.app') --}}

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        <img src="{{ asset('images/logo-kpu.png') }}" class="img-login">
                        <br><br>
                        <h6>Sistem Informasi Kepegawaian</h6>
                        <h6>KPU Provinsi Bali</h6>
                        <div class="underline-title"></div>
                        <br><br>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group  mb-0">
                                <center>

                                    <button type="submit" class="btn btn-btn">
                                        {{ __('Login') }}
                                    </button>
                                </center>
                                <center>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </center>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection --}}
