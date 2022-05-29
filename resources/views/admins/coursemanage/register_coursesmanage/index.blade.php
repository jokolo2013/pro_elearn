@extends('admins.layouts.app')
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการผู้ลงทะเบียนคอร์ส</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admins/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ url('coursemanageRegister/') }}">จัดการผู้ลงทะเบียนคอร์ส</a></li>
                        <li class="breadcrumb-item active">{{ $cname->course_name }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- Main Content --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row" style="background-color:#FFFFFF">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-warning mt-3" data-toggle="modal"
                                data-target="#creatlessons"><i class="fas fa-plus"></i>
                                เพิ่มผู้ลงทะเบียนคอร์ส</button><br>
                            <div class="modal fade" id="creatlessons" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ลงทะเบียนคอร์ส
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <?= Form::open(['url' => 'Register_coursesManage/', 'files' => false]) ?>
                                            <div class="form-group">
                                                <label for="">ชื่อ - นามสกุล</label>
                                                <select class="form-control" name="id_users" id="id_users">
                                                    @foreach ($register_course as $regisc)
                                                        @foreach ($allusers as $alluser)
                                                            <?php if($regisc->id_users != $alluser->id){ ?>
                                                            <option value="{{ $alluser->id }}">{{ $alluser->Fname }}
                                                                {{ $alluser->Lname }}</option>
                                                            <?php } ?>
                                                        @endforeach
                                                    @endforeach
                                                    <?php if($register_course->count() == 0 ){ ?>
                                                        @foreach ($allusers as $alluser)
                                                        <option value="{{ $alluser->id }}">{{ $alluser->Fname }}
                                                            {{ $alluser->Lname }}</option>
                                                    @endforeach
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <hr>
                                            <input type="hidden" id="courses_id" name="courses_id"
                                                value="{{ $cname->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
											{!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">แสดงข้อมูลผู้ลงทะเบียนเรียนทั้งหมด
                                        {{ $register_course->count() }} คน
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อผู้ลงทะเบียน</th>
                                                <th>คะแนนแบบทดสอบก่อนเรียน</th>
                                                <th>จำนวนในการทำแบบทดสอบก่อนเรียน</th>
                                                <th>คะแนนแบบทดสอบหลังเรียน</th>
                                                <th>จำนวนในการทำแบบทดสอบหลังเรียน</th>
                                                <th>วันที่ลงทะเบียน</th>
                                                <th>เกียรติบัตร</th>
                                                <th>ยกเลิกการลงทะเบียน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($register_course as $regisc)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $regisc->Fname }} {{ $regisc->Lname }}</td>
                                                    <td>{{ $regisc->pretest_score }} /
                                                        {{ $pretestQmax[$regisc->id_users]['count'] }} </td>
                                                    <td>{{ $regisc->pretest_count }}</td>
                                                    <td>{{ $regisc->posttest_score }} /
                                                        {{ $posttestQmax[$regisc->id_users]['count'] }}</td>
                                                    <td>{{ $regisc->posttest_count }}</td>
                                                    <td>{{ DateThai($regisc->created_at) }}</td>
                                                    <td>
                                                        <?php if($certificate[$regisc->id_users]["certificate"] == NULL){ ?>
                                                        <a class="btn btn-danger" href="#" role="button">
                                                            ไม่มีเกียรติบัตร </a>
                                                        <?php }else{ ?>
                                                        <a class="btn btn-success"
                                                            href="{{ url('Viewcertificate/' . $certificate[$regisc->id_users]['certificate']->id) }}"
                                                            target="_blank" role="button"> <i class="fas fa-print"></i>
                                                            พิมพ์เกียรติบัตร</a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#delete<?= $i ?>">
                                                            ลบ
                                                        </button>
                                                        <!-- Modal -->
                                                        <?= Form::open(['url' => 'Register_coursesManage/' . $regisc->id, 'method' => 'delete']) ?>
                                                        <div class="modal fade" id="delete<?= $i ?>" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            แจ้งเตือน</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        ต้องการลบ <i class="fas fa-arrow-right"></i>
                                                                        {{ $regisc->Fname }} {{ $regisc->Lname }}
                                                                        ออกจากผู้ลงทะเบียน

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก</button>
                                                                        <input id="user_id" name="user_id" type="hidden"
                                                                            value="{{ $regisc->id_users }}">
                                                                        <input id="course_id" name="course_id" type="hidden"
                                                                            value="{{ $cname->id }}">
                                                                        <button type="submit"
                                                                            class="btn btn-danger">ลบ</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @if (session()->has('status'))
        <script>
            swal("<?php echo session()->get('status'); ?>", "", "success");
        </script>
    @endif
@endsection
