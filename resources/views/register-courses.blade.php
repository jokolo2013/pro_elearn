@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-5 ml-5">
                <h1 style="color:#F77100">คอร์สเรียนของฉัน</h1>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row" style="background-color:#FFFFFF">
            <div class="col-12">
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                        <h3 class="card-title"> ลงทะเบียนคอร์สแล้ว {{$register_course_count}} คอร์ส
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อคอร์สเรียน</th>
                                    <th>ลงทะเบียนเมื่อ (ปี-เดือน-วัน)</th>
                                    <th>เกียรติบัตร</th>
                                    <th>ยกเลิกการลงทะเบียน</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($register_course as $regisc)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$regisc->course_name}}</td>
                                        <td>{{$regisc->created_at}}</td>
                                        <td>-</td>
                                        <td><a name="" id="" class="btn btn-danger" href="#" role="button">ยกเลิกการลงทะเบียน</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer')
    <script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["csv","print","colvis"]
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
@endsection
