@extends('layouts.app')
@section('content')
    <?php
    function DateThai($strDate)
    {
        $strYear = date('Y', strtotime($strDate)) + 543;
        $strMonth = date('n', strtotime($strDate));
        $strDay = date('j', strtotime($strDate));
        $strHour = date('H', strtotime($strDate));
        $strMinute = date('i', strtotime($strDate));
        $strSeconds = date('s', strtotime($strDate));
        $strMonthCut = ['', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds";
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-5 ml-5">
                <h1 style="color:#F77100">คอร์สเรียนของฉัน</h1>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row" style="background-color:#FFFFFF">
            <div class="col-lg-12">
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                        <h3 class="card-title"> ลงทะเบียนคอร์สแล้ว {{ $register_course_count }} คอร์ส
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อคอร์สเรียน</th>
                                    <th>ลงทะเบียนเมื่อ</th>
                                    <th>คะแนนแบบทดสอบก่อนเรียนที่มากสุด</th>
                                    <th>จำนวนครั้งที่ทำแบบทดสอบก่อนเรียน</th>
                                    <th>คะแนนแบบทดสอบหลังเรียนที่มากสุด</th>
                                    <th>จำนวนครั้งที่ทำแบบทดสอบหลังเรียน</th>
                                    <th>เกียรติบัตร</th>
                                    <th>ยกเลิกการลงทะเบียน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                ?>
                                @foreach ($register_course as $regisc)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $regisc->course_name }}</td>
                                        <td>{{ DateThai($regisc->created_at) }}</td>
                                        <td>
                                            {{ $regisc->pretest_score }} /
                                            {{ $pretestQmax[$regisc->id_course]['count'] }}
                                        </td>
                                        <td>{{ $regisc->pretest_count }}</td>
                                        <td>{{ $regisc->posttest_score }} /
                                            {{ $posttestQmax[$regisc->id_course]['count'] }} </td>
                                        <td>{{ $regisc->posttest_count }}</td>
                                        <td>
                                            <?php if($certificate[$regisc->id_course]["certificate"] == NULL){ ?>
                                                <a class="btn btn-danger" href="#" role="button">
                                                    <i class="fas fa-window-close"></i> ไม่มีเกียรติบัตร </a>
                                            <?php }else{ ?>
                                                <a class="btn btn-success" href="Viewcertificate/<?= $certificate[$regisc->id_course]["certificate"]->id ?>"
                                                target="_blank" role="button"> <i class="fas fa-print"></i>
                                                พิมพ์เกียรติบัตร</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete<?= $i ?>"><i class="fas fa-trash-alt"></i>
                                                ยกเลิกการลงทะเบียน
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete<?= $i ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ต้องการยกเลิกการลงทะเบียนคอร์ส
                                                            <b>{{ $regisc->course_name }}</b>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">ยกเลิก</button>
                                                            <?= Form::open(['url' => 'register_courses/' . $regisc->id, 'method' => 'delete']) ?>
                                                            <button type="submit" class="btn btn-danger">ลบ</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "print", "colvis"]
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
    @if (session()->has('delete'))
        <script>
            swal("<?php echo session()->get('delete'); ?>", "", "success");
        </script>
    @endif
@endsection
