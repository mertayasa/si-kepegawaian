@include('layouts.header')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Pegawai</h6>
                        </div>
                        <form action="{{ route('update_pegawai',$pegawai->id)}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label @error('nama')
                                    class="text-danger"
                                @enderror>Nama @error('nama')
                                   | {{ $message }}
                                @enderror</label>
                                <input type="text" name="nama"
                                @if (old('nama'))
                                  value="{{ old('nama') }}"
                                @else
                                  value="{{ $pegawai->nama }}"
                                @endif
                                class="form-control">
                                </div>

                                <div class="form-group">
                                    <label @error('alamat')
                                        class="text-danger"
                                    @enderror>Alamat @error('alamat')
                                       | {{ $message }}
                                    @enderror</label>
                                    <input type="text" name="alamat"
                                    @if (old('alamat'))
                                      value="{{ old('alamat') }}"
                                    @else
                                      value="{{ $pegawai->alamat }}"
                                    @endif
                                    class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label @error('no_hp')
                                            class="text-danger"
                                        @enderror>No. Telepon @error('no_hp')
                                           | {{ $message }}
                                        @enderror</label>
                                        <input type="text" name="no_hp"
                                        @if (old('no_hp'))
                                          value="{{ old('no_hp') }}"
                                        @else
                                          value="{{ $pegawai->no_hp }}"
                                        @endif
                                        class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label @error('nama')
                                                class="text-danger"
                                            @enderror>Umur @error('umur')
                                               | {{ $message }}
                                            @enderror</label>
                                            <input type="text" name="umur"
                                            @if (old('umur'))
                                              value="{{ old('umur') }}"
                                            @else
                                              value="{{ $pegawai->umur }}"
                                            @endif
                                            class="form-control">
                                            </div>


                            <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control" name="jk">
                                {{-- <option class="disabled"></option> --}}
                                <option @if(old('jk',$pegawai->jk) == 'Laki-laki') selected @endif>Laki-Laki</option>
                                <option @if(old('jk',$pegawai->jk) == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>

                            <div class="form-group">
                                <label @error('foto')
                                    class="text-danger"
                                @enderror>Foto @error('foto')
                                   | {{ $message }}
                                @enderror</label>
                                <input type="text" name="foto"
                                @if (old('foto'))
                                  value="{{ old('foto') }}"
                                @else
                                  value="{{ $pegawai->foto }}"
                                @endif
                                class="form-control">
                                </div>


                                <div class="form-group">
                                    <label @error('golongan')
                                        class="text-danger"
                                    @enderror>Golongan @error('golongan')
                                       | {{ $message }}
                                    @enderror</label>
                                    <input type="text" name="golongan"
                                    @if (old('golongan'))
                                      value="{{ old('golongan') }}"
                                    @else
                                      value="{{ $pegawai->golongan }}"
                                    @endif
                                    class="form-control">
                                    </div>



                            <div class="text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                                <a href="{{ url('pegawai')}}" class="btn btn-danger mr-1">Back</a>
                              </div>
                        </div>
                    </form>
                    </div>

                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('layouts.alert_logout')
    @include('layouts.scripts')


</body>

</html>
