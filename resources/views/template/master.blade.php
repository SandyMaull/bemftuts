<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/bem.png') }}" sizes="16x16">

  <title>BEM FT UTS - @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admintemplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('admintemplate/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('admintemplate/css/sb-admin.css')}}" rel="stylesheet">

  <!-- Toastr Styles -->
  <link href="{{asset('assets/auth/toastr.min.css')}}" rel="stylesheet">


</head>

<body id="page-top">

    @include('template.navbar')

  <div id="wrapper">

    <!-- Sidebar -->
    @include('template.sidebar')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        @yield('breadcrumbs')


        <!-- Page Content -->
        @yield('content')

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>
                <p class="copyright">
                    &copy; 2019
                    <a href="https://www.bemftuts.my.id" target="_blank">Badan Eksekutif Mahasiswa Fakultas Teknik Universitas Teknologi Sumbawa</a>. All Rights Reserved.
                </p>
            </span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik Tombol "Logout" dibawah jika anda ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('login.out')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/vendor/jquery/jquery.min.js')}}"></script>
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/vendor/chart.js/Chart.min.js')}}"></script>
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/js/sb-admin.min.js')}}"></script>
  <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/toastr.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script nonce="4LLScR1pT1H4V3" src="{{asset('admintemplate/js/demo/datatables-demo.js')}}"></script>
  {{-- <script src="{{asset('admintemplate/js/demo/chart-area-demo.js')}}"></script> --}}

    @include('template.message')

    @yield('script')

</body>

</html>
