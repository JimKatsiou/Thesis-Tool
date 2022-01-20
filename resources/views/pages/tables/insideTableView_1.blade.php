@extends('pages.charts.layouts.chart-layout')
@section('title','Profile')

<body>
@section('content')
    <div class="topnav">
            <a href="{{ route('tableView_2') }}" class="btn btn-primary">Back to Dashboard</a>
            {{-- <a href="#">Link</a> --}}
    </div>

<!-- Main content -->
<div>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                   <thead>
                        <tr>
                            <th>Technology Name</th>
                            <th>Number Of Sensors</th>
                            <th>Cost Of Sensors</th>
                            <th>Cost Of Instalation</th>
                            <th>Final Cost</th>
                            <th>Energy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5G</td>
                            <td>5</td>
                            <td>100</td>
                            <td>300</td>
                            <td>800</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>LoRa</td>
                            <td>5</td>
                            <td>100</td>
                            <td>1000</td>
                            <td>1500</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>NB-IoT</td>
                            <td>5</td>
                            <td>100</td>
                            <td>1000</td>
                            <td>600</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                    {{-- <tfoot>
                        <tr>
                            <th>Technology Name</th>
                            <th>Number Of Sensors</th>
                            <th>Cost Of Sensors</th>
                            <th>Cost Of Instalation</th>
                            <th>Final Cost</th>
                            <th>Energy</th>
                        </tr>
                    </tfoot> --}}
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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

  @endsection
<a id="back-to-top" href="{{ route('tableView_2') }}#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
</a>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
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
</script>
