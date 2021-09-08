<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agenda|Surat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
<!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('/adminLTE/plugins/toastr/toastr.min.css')}}">
<!-- daterange picker -->
  <!-- <link rel="stylesheet" href="{{asset('/adminLTE/plugins/daterangepicker/daterangepicker.css')}}"> -->

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('parsial.setting')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Agenda Surat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="form-inline">
        
      </div>

      <!-- Sidebar Menu -->
      @include('parsial.menu')


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <section class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-0">
                      <div class="col-sm-6">
                        <h1 >Data Surat Masuk</h1>
                      </div>
                      
                    </div>
                  </div><!-- /.container-fluid -->
                </section>


              <!-- /.card-header -->
              <div class="card-body">
                <form action="/tambahDisposisi/{{$dataSM->id_surat_masuk }}" method="post" role="form" enctype="multipart/form-data">
                  <div class="modal-body">  
                      {{csrf_field()}}
                      <input type="hidden" name="id_surat_masuk" id="id_surat_masuk" class="id_surat_masuk" value="{{ $dataSM->id_surat_masuk }}">

                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Asal Surat:</label>
                        <input type="text" class="form-control asal_surat_masuk" id="u_asal_surat_masuk" name="u_asal_surat_masuk" value="{{ $dataSM->asal_surat_masuk }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nomor Surat:</label>
                        <input type="text" class="form-control no_surat_masuk" id="u_no_surat_masuk" name="u_no_surat_masuk" value="{{ $dataSM->no_surat_masuk }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Surat:</label>
                        <input type="date" class="form-control tgl_surat_masuk" id="u_tgl_surat_masuk" name="u_tgl_surat_masuk" value="{{ $dataSM->tgl_surat_masuk }}" disabled>

                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Perihal</label>
                        <textarea class="form-control perihal_surat_masuk" id="u_perihal_surat_masuk" name="u_perihal_surat_masuk" disabled><?php echo $dataSM['perihal_surat_masuk']?></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="message-text">Upload File Surat Masuk :</label>
                        <a href="{{asset(Storage::url($dataSM->file_surat_masuk))}}" class="btn btn-warning" target="_blank"><i class="fa fa-eye">Lihat Surat</i></a>
                        <!-- <input type="file" class="form-control" id="u_file_surat_masuk" name = "u_file_surat_masuk" accept="application/pdf, image/png, image/jpg, image/gif" value="{{ $dataSM['public/file_surat_masuk'] }}"> -->
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Terima Surat:</label>
                        <input type="date" class="form-control tgl_terima" id="u_tgl_terima" name="u_tgl_terima" value="{{ $dataSM->tgl_terima }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nomor Agenda:</label>
                        <input type="number" class="form-control no_agenda" id="u_no_agenda" name="u_no_agenda" value="{{ $dataSM->no_agenda }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sifat Surat:</label>
                          <select class="form-control select2 sifat_surat" id="u_sifat_surat" name="u_sifat_surat" style="width: 100%;" disabled>
                            <option selected value="{{$dataSM->sifat_surat}}">{{$dataSM->sifat_surat}}</option>
                            <!-- <option>-</option>
                            <option Value="Biasa">Biasa</option>
                            <option Value="Penting">Penting</option>
                            <option Value="Sangat Penting">Sangat Penting</option>
                            <option Value="Rahasia">Rahasia</option>
                            <option Value="Segera">Segera</option> -->
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Instruksi</label>
                        <textarea class="form-control" id="instruksi" name="instruksi"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tanggal Instruksi:</label>
                        <input type="date" class="form-control" id="tgl_instruksi" name="tgl_instruksi">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Penerima Instruksi:</label>
                          <select class="form-control select2" id="penerima_instruksi" name="penerima_instruksi" style="width: 100%;">
                            <option>-</option>
                            <option>Sekretaris</option>
                            <option>Kepala Bidang PP ASN</option>
                            <option>Kepala Bidang Bangpeg</option>
                            <option>Kepala Bidang Kesdis</option>
                            <option>Kepala Bidang Diklat</option>
                          </select>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <a href="/suratNaik"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
                     <button type="submit" class="btn btn-primary">Simpan Edit</button>
                  </div>
                  </form>
              </div>
              <!-- /.card-body -->
            
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('parsial.footer')
 
</div>
</body>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- <script src="{{asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script> -->
<!-- <script src="{{asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> -->
<script src="{{asset('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<!-- <script src="{{asset('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script> -->
<!-- <script src="{{asset('adminLTE/plugins/jszip/jszip.min.js')}}"></script> -->
<!-- <script src="{{asset('adminLTE/plugins/pdfmake/pdfmake.min.js')}}"></script> -->
<!-- <script src="{{asset('adminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script> -->
<!-- <script src="{{asset('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script> -->
<!-- <script src="{{asset('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
 -->
 <script src="{{asset('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->

<script src="{{asset('adminLTE/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('adminLTE/dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminLTE/dist/js/pages/dashboard3.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{asset('/adminLTE/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- date-range-picker -->
<!-- <script src="{{asset('/adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
 -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(document).on("click",".konfirmasi", function(event){
    event.preventDefault();
    const url = $(this).attr('href');

    var answer = window.confirm("kamu yakin ingin memproses data?");
    if(answer){
      window.location.href = url;
    }else{

    }
  });

$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    @if(\Session::has('berhasil'))
      Toast.fire({
        icon: 'success',
        title: '{{Session::get('berhasil')}}'
      })
    @endif
    
    @if(\Session::has('gagal'))  
      Toast.fire({
        icon: 'error',
        title: '{{Session::get('gagal')}}'
      })
    @endif
    
    @if(count($errors) > 0)
      Toast.fire({
        icon: 'error',
        title: '<ul>@foreach($errors->all() as $error) <li>{{$error}}@endforeach</li></ul>'
      })
    @endif
  });
  
   $(document).on("click", ".ubah", function(){
    var asal_surat_masuk = $(this).data('asal_surat_masuk');
    var no_surat_masuk = $(this).data('no_surat_masuk');
    var perihal_surat_masuk = $(this).data('perihal_surat_masuk');
    var tgl_surat_masuk = $(this).data('tgl_surat_masuk');
    var file_surat_masuk = $(this).data('file_surat_masuk');
    var tgl_terima = $(this).data('tgl_terima');
    var no_agenda = $(this).data('no_agenda');
    var sifat_surat = $(this).data('sifat_surat');
    var id_surat_masuk = $(this).data('id_surat_masuk');

    $(".asal_surat_masuk").val(asal_surat_masuk);
    $(".no_surat_masuk").val(no_surat_masuk);
    $(".perihal_surat_masuk").val(perihal_surat_masuk);
    $(".tgl_surat_masuk").val(tgl_surat_masuk);
    $(".file_surat_masuk").val(file_surat_masuk);
    $(".tgl_terima").val(tgl_terima);
    $(".no_agenda").val(no_agenda);
    $(".sifat_surat").val(sifat_surat);
    $(".id_surat_masuk").val(id_surat_masuk);

  });

  $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });



</script>



</body>
</html>
