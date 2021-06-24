<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SI Kepegawaian</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}
  <!-- Custom styles for this template-->
  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('vendor/sweetalert2/dist/sweetalert2.css')}}">

  @stack('styles')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
          @include('layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.alert_logout')

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('js/app.js')}}"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('vendor/sweetalert2/dist/sweetalert2.js')}}"></script>

  <!-- Page level custom scripts -->
  {{-- <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script> --}}
  {{-- <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script> --}}
  <script>
    function deleteModel(deleteUrl, tableId){
        Swal.fire({
            title: "Warning",
            text: "Yakin menghapus data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#169b6b',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : deleteUrl,
                    dataType : "Json",
                    data : {"_token": "{{ csrf_token() }}"},
                    method : "delete",
                    success:function(data){
                        console.log(data)
                        if(data.code == 1){
                            Swal.fire(
                                'Berhasil',
                                data.message,
                                'success'
                        )
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message
                            })
                        }
                        $('#'+tableId).DataTable().ajax.reload();
                    }
                })
            }
        })
      }

    function updateStatus(updateUrl, tableId, status){
        let confirmation
        if(status == 1){
          confirmation = 'Terima pengajuan cuti ?'
        }else{
          confirmation = 'Tolak pengajuan cuti ?'
        }
        Swal.fire({
            title: "Warning",
            text: confirmation,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#169b6b',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : updateUrl,
                    dataType : "Json",
                    data : {"_token": "{{ csrf_token() }}"},
                    method : "get",
                    success:function(data){
                        console.log(data)
                        if(data.code == 1){
                            Swal.fire(
                                'Berhasil',
                                data.message,
                                'success'
                        )
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message
                            })
                        }
                        $('#'+tableId).DataTable().ajax.reload();
                    }
                })
            }
        })
      }
  </script>
  @stack('scripts')
</body>

</html>
