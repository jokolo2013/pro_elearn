@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการเกียรติบัตร</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admins/')}}">Home</a></li>
                        <li class="breadcrumb-item active">จัดการเกียรติบัตร</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">

        <div class="row" style="background-color:#FFFFFF">
            <div class="col-1"></div>
            <div class="col-10">
                <br>

                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        <div class="row">
                            <div class="col-8">แสดงข้อมูลคอร์สเรียน จํานวนทั้งหมด {{ $courses->total() }}
                                คอร์สเรียน
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped text-center" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ปกคอร์ส</th>
                                <th>ชื่อคอร์ส</th>
                                <th>หมวดคอร์ส</th>
                                <th>ผู้สร้างคอร์ส</th>
                                <th>สถานะการเผยแพร่</th>
                                <th>จัดการเกียรติบัตร</th>
                                <th>ตัวอย่าง</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($courses as $course)
                                <?php $i++; ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                        <a href="{{ asset('images/course/cover/' . $course->course_images) }}"
                                            target="_blank" data-lity>
                                            <img src="{{ asset('images/course/cover/' . $course->course_images) }}"
                                                style="width:150px">
                                        </a>
                                    </td>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->courses_type->courses_type_name }}</td>
                                    <td>
                                        @foreach ($userProfile as $user)
                                            <?php
                                            if ($user->id == $course->id_users) {
                                                echo $user->Fname . ' ' . $user->Lname;
                                            }
                                            ?>
                                        @endforeach
                                    </td>
                                    <td>
                                        <?php if($course->publish == 0) echo '<i class="fas fa-circle" style="color:red"></i> ยังไม่เผยแพร่';?>
                                        <?php if($course->publish == 1) echo '<i class="fas fa-circle" style="color:green"></i> เผยแพร่แล้ว' ;?>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary" href="CourseCertificateManage/<?=$course->id?>/edit" role="button"><i class="fas fa-edit"></i> จัดการเกียรติบัตร</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-dark" href="CourseCertificateManageView/<?=$course->id?>" role="button"><i class="fas fa-edit"></i> ดูตัวอย่างเกียรติบัตร</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <br>
                        {{-- {{ $courses->links() }} --}}
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
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
