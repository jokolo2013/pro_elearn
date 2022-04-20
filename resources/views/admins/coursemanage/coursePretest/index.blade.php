@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการแบบทดสอบก่อนเรียน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admins/')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('coursemanageTest/')}}">จัดการแบบทดสอบก่อนเรียน</a></li>
                        <li class="breadcrumb-item active">{{ $cname->course_name }}</li>
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
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#creatcourse"><i class="fas fa-plus"></i> สร้างคำถาม</button>
                <div class="modal fade" id="creatcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">สร้างคำถาม
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left">
                                <?= Form::open(['url' => 'CoursePretestManage/', 'files' => true]) ?>
                                <div class="form-group">
                                    <?= Form::label('pretest_question', 'โจทย์') ?>
                                    <?= Form::text('pretest_question', null, ['class' => 'form-control', 'placeholder' => 'โจทย์', 'required']) ?>
                                </div>
                                {{-- <div class="form-group">
                                    {!! Form::label('course_images', 'เพิ่มรูปภาพ') !!}
                                    <?= Form::file('course_images', null, ['class' => 'form-control']) ?>
                                </div> --}}
                                <hr>
                                <div class="form-group form-inline">
                                    <?= Form::label('pretest_answer1', 'คำตอบที่ 1') ?>
                                    <?= Form::text('pretest_answer1', null, ['class' => 'form-control w-50 ml-2 mr-2', 'placeholder' => 'คำตอบที่ 1', 'required']) ?>
                                        <input type="checkbox" class="form-check-input" name="pretest_score" id="pretest_score" value="1">

                                </div>
                                <div class="form-group form-inline">
                                    <?= Form::label('pretest_answer2', 'คำตอบที่ 2') ?>
                                    <?= Form::text('pretest_answer2', null, ['class' => 'form-control w-50 ml-2 mr-2', 'placeholder' => 'คำตอบที่ 2', 'required']) ?>
                                        <input type="checkbox" class="form-check-input" name="pretest_score" id="pretest_score" value="1">

                                </div>
                                <div class="form-group form-inline">
                                    <?= Form::label('pretest_answer3', 'คำตอบที่ 3') ?>
                                    <?= Form::text('pretest_answer3', null, ['class' => 'form-control w-50 ml-2 mr-2', 'placeholder' => 'คำตอบที่ 3', 'required']) ?>
                                        <input type="checkbox" class="form-check-input" name="pretest_score" id="pretest_score" value="1">

                                </div>
                                <div class="form-group form-inline">
                                    <?= Form::label('pretest_answer4', 'คำตอบที่ 4') ?>
                                    <?= Form::text('pretest_answer4', null, ['class' => 'form-control w-50 ml-2 mr-2', 'placeholder' => 'คำตอบที่ 4', 'required']) ?>
                                        <input type="checkbox" class="form-check-input" name="pretest_score" id="pretest_score" value="1">
                                </div>
                                <input type="hidden" id="courses_id" name="courses_id" value="{{$cname->id}}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">เพิ่มคำถาม</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        <div class="row">
                            <div class="col-8">แสดงข้อมูลแบบทดสอบก่อนเรียน จํานวนทั้งหมด {{$pretest->count()}} ข้อ
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped text-center" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>โจทย์</th>
                                <th>ภาพประกอบ</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($pretest as $pt)
                                <?php $i++; ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>{{$pt->pretest_question}}</td>
                                    <td>ภาพ</td>
                                    <td>แก้ไข</td>
                                    <td>ลบ</td>
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
