@include('layouts.header')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">FORGOT YOUR PASSWORD?</h1>
                                        <p class="mb-4">Masukkan alamat email Anda di bawah ini dan sistem akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                                    </div>
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    <form class="user" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror form-control-user"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail"
                                            aria-describedby="emailHelp" autofocus placeholder="Enter Email Address..." >
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                {{ __('Send Password Reset Link') }}
                                            </button>
                                        </div>

                                    </form>
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


