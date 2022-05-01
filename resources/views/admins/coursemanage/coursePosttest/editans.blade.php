@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">แก้ไขโจทย์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admins/') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('coursemanageTest/') }}">จัดการแบบทดสอบก่อนเรียน</a>
                        </li>
                        <li class="breadcrumb-item "><a
                                href="{{ url('CoursePosttestManage/' . $courses->id . '/edit') }}">{{ $courses->course_name }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $posttest->posttest_question }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">

        <div class="row" style="background-color:#FFFFFF">
            <div class="col-2"></div>
            <div class="col-8">
                <br>
                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        <div class="row">
                            <div class="col-8"> แก้ไขโจทย์
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <br>
                        {{-- {{ $courses->links() }} --}}
                        <?= Form::model($posttest, ['url' => 'AnsPosttestController/' . $posttest->id, 'method' => 'put', 'files' => false]) ?>
                        <div class="form-group">
                            <?= Form::label('posttest_question', 'โจทย์') ?>
                            <?= Form::text('posttest_question', null, ['class' => 'form-control', 'placeholder' => 'โจทย์', 'required']) ?>
                        </div>
                        {{-- <div class="form-group">
                                    {!! Form::label('course_images', 'เพิ่มรูปภาพ') !!}
                                    <?= Form::file('course_images', null, ['class' => 'form-control']) ?>
                                </div> --}}
                        <hr>
                        <?php $i=0 ?>
                        @foreach ($answer as $ans)
                        <?php $i++ ?>
                        <div class="form-group form-inline">
                           <div class="form-group">
                             <label for="ans<?php echo $i?>" class="mr-3">คำตอบที่ {{$i}}</label>
                             <input type="text" class="form-control mr-3" name="posttest_answer<?php echo $i?>" id="posttest_answer<?php echo $i?>" aria-describedby="helpId" placeholder="คำตอบที่ <?php echo  $i?>" value="<?php echo $ans->posttest_answer?>">
                           </div>
                            <input type="checkbox" class="form-check-input" name="posttest_score{{$i}}" id="posttest_score{{$i}}"
                                value="1" <?php if($ans->posttest_score == 1) echo 'checked';?>>
                            <input type="hidden" id="id{{$i}}" name="id{{$i}}" value="{{ $ans->id }}">
                        </div>
                        @endforeach
                        <input type="hidden" id="id" name="id" value="{{ $posttest->id }}">
                        <input type="hidden" id="courses_id" name="courses_id" value="{{$courses->id}}">
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('CoursePosttestManage/' . $courses->id . '/edit') }}" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</a>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-2"></div>
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
