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
                            <h6 class="m-0 font-weight-bold text-primary">Form Input Data Pegawai</h6>
                        </div>
                        <form action="{{route('simpan_pegawai')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label @error('nama')
                                    class="text-danger"
                                @enderror>Nama @error('nama')
                                   | {{ $message }}
                                @enderror</label>
                              <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
                              </div>

                              <div class="form-group">
                                <label @error('alamat')
                                    class="text-danger"
                                @enderror>Alamat @error('alamat')
                                   | {{ $message }}
                                @enderror</label>
                              <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control">
                              </div>

                              <div class="form-group">
                                <label @error('no_hp')
                                    class="text-danger"
                                @enderror>No. Telepon @error('no_hp')
                                   | {{ $message }}
                                @enderror</label>
                              <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control">
                              </div>

                              <div class="form-group">
                                <label @error('umur')
                                    class="text-danger"
                                @enderror>Umur @error('umur')
                                   | {{ $message }}
                                @enderror</label>
                              <input type="text" name="umur" value="{{ old('umur') }}" class="form-control">
                              </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jk">
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label @error('foto')
                                    class="text-danger"
                                @enderror>Foto @error('foto')
                                   | {{ $message }}
                                @enderror</label>
                              <input type="text" name="foto" value="{{ old('foto') }}" class="form-control">
                              </div>

                              <div class="form-group">
                                <label @error('golongan')
                                    class="text-danger"
                                @enderror>Golongan @error('golongan')
                                   | {{ $message }}
                                @enderror</label>
                              <input type="text" name="golongan" value="{{ old('golongan') }}" class="form-control">
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
