@extends('admins.layouts.app')

@section('content')
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
                        <li class="breadcrumb-item"><a href="{{ url('coursemanage/') }}">จัดการคอร์สเรียน</a></li>
                        <li class="breadcrumb-item active">จัดการผู้ลงทะเบียนคอร์ส</li>
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
                                data-target="#creatlessons"><i class="fas fa-plus"></i> เพิ่มผู้ลงทะเบียนคอร์ส</button><br>
                            <div class="modal fade" id="creatlessons" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">สร้างคอร์สเรียน
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">แสดงข้อมูลผู้ลงทะเบียนเรียนทั้งหมด {{ $register_course->count() }} คน
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
                                                <th>คะแนนแบบทดสอบหลังเรียน</th>
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
                                                    <td>{{$i}}</td>
                                                    <td>{{$regisc->Fname}} {{$regisc->Lname}}</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>{{$regisc->created_at}}</td>
                                                    <td>-</td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#exampleModal<?= $i ?>">
                                                            ลบ
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1"
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
                                                                        ต้องการลบ <i class="fas fa-arrow-right"></i> {{$regisc->Fname}} {{$regisc->Lname}} ออกจากผู้ลงทะเบียน

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก</button>
                                                                        <?= Form::open(['url' => 'lessonsmanage/' . $regisc->id, 'method' => 'delete']) ?>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">ลบ</button>
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
