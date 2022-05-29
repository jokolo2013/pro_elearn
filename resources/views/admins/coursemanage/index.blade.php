@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการคอร์สเรียน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admins/')}}">Home</a></li>
                        <li class="breadcrumb-item active">จัดการคอร์สเรียน</li>
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
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#creatcourse"><i class="fas fa-plus"></i> สร้างคอร์สเรียน</button>
                <div class="modal fade" id="creatcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">สร้างคอร์สเรียน
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left">
                                <?= Form::open(['url' => 'coursemanage/', 'files' => true]) ?>
                                <div class="form-group">
                                    <?= Form::label('course_name', 'ชื่อคอร์ส') ?>
                                    <?= Form::text('course_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อคอร์ส', 'required']) ?>
                                </div>
                                <div class="form-group">
                                    <?= Form::label('course_detail', 'รายละเอียดคอร์ส') ?>
                                    <?= Form::textarea('course_detail', null, ['class' => 'form-control', 'placeholder' => 'รายละเอียดคอร์ส', 'rows' => '5', 'required']) ?>
                                </div>
                                <div class="form-group">
                                    <?= Form::label('course_will_learn', 'สิ่งที่จะได้เรียนรู้') ?>
                                    <?= Form::textarea('course_will_learn', null, ['class' => 'form-control', 'placeholder' => 'สิ่งที่จะได้เรียนรู้', 'rows' => '5', 'required']) ?>
                                </div>
                                <div class="form-group">
                                    <?= Form::label('course_objective', 'วัตถุประสงค์') ?>
                                    <?= Form::textarea('course_objective', null, ['class' => 'form-control', 'placeholder' => 'วัตถุประสงค์', 'rows' => '5', 'required']) ?>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('course_type_id', 'หมวดหมู่คอร์ส') !!}
                                    <?= Form::select('course_type_id', App\Courses_type::all()->pluck('courses_type_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'เลือกหมวดคอร์ส', 'required']) ?>
                                </div>
                                <div class="form-group">
                                    <label for="course_difficulty">ความยากของคอร์สเรียน</label>
                                    <div class="col-md-6 mt-2">
                                        <input type="radio" id="course_difficulty_0" name="course_difficulty" value="0"
                                            checked>
                                        <label for="html">ง่าย</label>
                                        <input type="radio" id="course_difficulty_1" name="course_difficulty" value="1">
                                        <label for="html">ปานกลาง</label>
                                        <input type="radio" id="course_difficulty_2" name="course_difficulty" value="2">
                                        <label for="html">ยาก</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?= Form::label('course_times', 'เวลาที่คาดว่าจะใช้ในบทเรียน (ชั่วโมง)') ?>
                                    <?= Form::number('course_times', null, ['class' => 'form-control w-25', 'placeholder' => 'เวลาที่คาดว่าจะใช้ในบทเรียน (ชั่วโมง)', 'required']) ?>
                                </div>
                                <div class="form-group">
                                    <?= Form::label('courses_passed', 'เกณฑ์ผ่านคอร์ส (0-100%)') ?>
                                    <?= Form::number('courses_passed', null, ['class' => 'form-control w-25', 'placeholder' => 'เกณฑ์ผ่านคอร์ส %', 'min="1" max="100"', 'required']) ?>
                                </div>
                                <div class="form-group">
                                    <?= Form::label('course_videos', 'Link วิดีโอแนะนำคอร์ส') ?>
                                    <?= Form::text('course_videos', null, ['class' => 'form-control', 'placeholder' => 'วิดีโอแนะนำคอร์ส', 'required']) ?>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('course_images', 'แก้ไขรูปภาพ') !!}
                                    <?= Form::file('course_images', null, ['class' => 'form-control']) ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        <div class="row">
                            <div class="col-8">แสดงข้อมูลคอร์สเรียน จํานวนทั้งหมด {{ $courses->count() }}
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
                                <th>แก้ไขคอร์ส</th>
                                <th>ลบ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            <?php if($courses->count()==0){ ?>
                                <tr>
                                    <td colspan="8">ไม่มีคอร์สในตอนนี้</td>
                                </tr>
                           <?php }else{ ?>
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
                                        <button type="button" class="btn btn-dark" data-toggle="modal"
                                            data-target="#editcourse<?= $i ?>"><i class="fas fa-edit"></i> แก้ไขคอร์ส</button>
                                        <div class="modal fade" id="editcourse<?= $i ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขคอร์ส
                                                            {{ $course->course_name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <?= Form::model($course, ['url' => 'coursemanage/' . $course->id, 'method' => 'put', 'files' => true]) ?>
                                                        <div class="form-group">
                                                            <?= Form::label('course_name', 'ชื่อคอร์ส') ?>
                                                            <?= Form::text('course_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อคอร์ส', 'required']) ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <?= Form::label('course_detail', 'รายละเอียดคอร์ส') ?>
                                                            <?= Form::textarea('course_detail', null, ['class' => 'form-control', 'placeholder' => 'รายละเอียดคอร์ส', 'rows' => '5', 'required']) ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <?= Form::label('course_will_learn', 'สิ่งที่จะได้เรียนรู้') ?>
                                                            <?= Form::textarea('course_will_learn', null, ['class' => 'form-control', 'placeholder' => 'สิ่งที่จะได้เรียนรู้', 'rows' => '5', 'required']) ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <?= Form::label('course_objective', 'วัตถุประสงค์') ?>
                                                            <?= Form::textarea('course_objective', null, ['class' => 'form-control', 'placeholder' => 'วัตถุประสงค์', 'rows' => '5', 'required']) ?>
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('course_type_id', 'หมวดหมู่คอร์ส') !!}
                                                            <?= Form::select('course_type_id', App\Courses_type::all()->pluck('courses_type_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'เลือกหมวดคอร์ส', 'required']) ?>
                                                        </div>
                                                        <?php
                                                        $c1 = '';
                                                        $c2 = '';
                                                        if ($course->publish == 0) {
                                                            $c1 = 'checked';
                                                        }
                                                        if ($course->publish == 1) {
                                                            $c2 = 'checked';
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="publish">ความยากของคอร์สเรียน</label>
                                                            <div class="col-md-6 mt-2">
                                                                <input type="radio" id="publish_0"
                                                                    name="publish" value="0" <?= $c1 ?>>
                                                                <label for="html">ไม่เผยแพร่</label>
                                                                <input type="radio" id="publish_1"
                                                                    name="publish" value="1" <?= $c2 ?>>
                                                                <label for="html">เผยแพร่</label>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $se1 = '';
                                                        $se2 = '';
                                                        $se3 = '';
                                                        if ($course->course_difficulty == 0) {
                                                            $se1 = 'checked';
                                                        }
                                                        if ($course->course_difficulty == 1) {
                                                            $se2 = 'checked';
                                                        }
                                                        if ($course->course_difficulty == 2) {
                                                            $se3 = 'checked';
                                                        }
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="course_difficulty">เผยแพร่คอร์สเรียน</label>
                                                            <div class="col-md-6 mt-2">
                                                                <input type="radio" id="course_difficulty_0"
                                                                    name="course_difficulty" value="0" <?= $se1 ?>>
                                                                <label for="html">ง่าย</label>
                                                                <input type="radio" id="course_difficulty_1"
                                                                    name="course_difficulty" value="1" <?= $se2 ?>>
                                                                <label for="html">ปานกลาง</label>
                                                                <input type="radio" id="course_difficulty_2"
                                                                    name="course_difficulty" value="2" <?= $se3 ?>>
                                                                <label for="html">ยาก</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <?= Form::label('course_times', 'เวลาที่คาดว่าจะใช้ในบทเรียน (ชั่วโมง)') ?>
                                                            <?= Form::number('course_times', null, ['class' => 'form-control w-25', 'placeholder' => 'ชื่อคอร์ส', 'required']) ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <?= Form::label('courses_passed', 'เกณฑ์ผ่านคอร์ส (0-100%)') ?>
                                                            <?= Form::number('courses_passed', null, ['class' => 'form-control w-25', 'placeholder' => 'เกณฑ์ผ่านคอร์ส %', 'min="1" max="100"', 'required']) ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <?= Form::label('course_videos', 'Link วิดีโอแนะนำคอร์ส') ?>
                                                            <?= Form::text('course_videos', null, ['class' => 'form-control', 'placeholder' => 'วิดีโอแนะนำคอร์ส', 'required']) ?>
                                                        </div>
                                                        <div>
                                                            <p><b>รูปภาพปกคอร์ส</b></p>
                                                            <a href="{{ asset('images/course/cover/' . $course->course_images) }}"
                                                                target="_blank">
                                                                <img src="{{ asset('images/course/cover/' . $course->course_images) }}"
                                                                    style="width:250px">
                                                            </a>
                                                        </div>

                                                        <br>

                                                        <div class="form-group">
                                                            {!! Form::label('course_images', 'แก้ไขรูปภาพ') !!}
                                                            <?= Form::file('course_images', null, ['class' => 'form-control']) ?>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete<?= $i?>"><i class="fas fa-trash-alt"></i> ลบ
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete<?= $i ?>" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ต้องการลบข้อมูลคอร์ส {{$course->course_name}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก</button>
                                                        <?= Form::open(['url' => 'coursemanage/' . $course->id, 'method' => 'delete']) ?>
                                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            <?php } ?>
                        </tbody>
                        </table>
                        <br>

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
