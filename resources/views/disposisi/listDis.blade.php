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
                        <h1 >Data surat masuk yang telah di disposisi</h1>
                      </div>
                      
                    </div>
                  </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                  <div class="container-fluid">
                      
                      <form action="enhanced-results.html">
                          <div class="row">
                              <div class="col-md-10">
                                  
                                      <div class="col-6">
                                          <!-- <div class="form-group">
                                            <div class="input-group input-group-lg">
                                              <label>Order By:</label>
                                              <select class="form-control select2" style="width: 100%;"  >
                                                  <option selected>Title</option>
                                                  <option>Date</option>
                                              </select>
                                            </div>
                                          </div> -->
                                          <div class="form-group">
                                          <div class="input-group input-group-lg">
                                              <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                                              <div class="input-group-append">
                                                  <button type="submit" class="btn btn-lg btn-default">
                                                      <i class="fa fa-search"></i>
                                                  </button>
                                              </div>
                                          </div>
                                        
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </form>
                  </div>
              </section>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Asal Surat</th>
                    <th>Nomor Surat</th>
                    <th>Tgl Surat</th>
                    <th>Perihal</th>
                    <th>File Surat</th>
                    <th>Tgl Terima</th>
                    <th>No Agenda</th>
                    <th>Sifat</th>
                    <th>Instruksi</th>
                    <th>Tgl Instruksi</th>
                    <th>Kepada</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach ($disposisi as $dis)
                  <tr>
                    <td>{{$dis->suratMasuk->asal_surat_masuk}}</td>
                    <td>{{$dis->suratMasuk->no_surat_masuk}}</td>
                    <td>{{$dis->suratMasuk->tgl_surat_masuk}}</td>
                    <td>{{$dis->suratMasuk->perihal_surat_masuk}}</td>
                    <td>
                      <a href="{{asset(Storage::url($dis->suratMasuk->file_surat_masuk))}}" class="btn btn-warning" target="_blank"><i class="fa fa-eye">Lihat Surat</i></a>
                    </td>
                    <td>{{$dis->suratMasuk->tgl_terima}}</td>
                    <td>{{$dis->suratMasuk->no_agenda}}</td>
                    <td>{{$dis->suratMasuk->sifat_surat}}</td>
                    <td>{{$dis->instruksi}}</td>
                    <td>{{$dis->tgl_instruksi}}</td>
                    <td>{{$dis->penerima_instruksi}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
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
