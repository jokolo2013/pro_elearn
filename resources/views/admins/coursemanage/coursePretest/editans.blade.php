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
                                href="{{ url('CoursePretestManage/' . $courses->id . '/edit') }}">{{ $courses->course_name }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $pretest->pretest_question }}</li>
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
                        <?= Form::model($pretest, ['url' => 'AnsManageController/' . $pretest->id, 'method' => 'put', 'files' => false]) ?>
                        <div class="form-group">
                            <?= Form::label('pretest_question', 'โจทย์') ?>
                            <?= Form::text('pretest_question', null, ['class' => 'form-control', 'placeholder' => 'โจทย์', 'required']) ?>
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
                             <input type="text" class="form-control mr-3" name="pretest_answer<?php echo $i?>" id="pretest_answer<?php echo $i?>" aria-describedby="helpId" placeholder="คำตอบที่ <?php echo  $i?>" value="<?php echo $ans->pretest_answer?>">
                           </div>
                            <input type="checkbox" class="form-check-input" name="pretest_score{{$i}}" id="pretest_score{{$i}}"
                                value="1" <?php if($ans->pretest_score == 1) echo 'checked';?>>
                            <input type="hidden" id="id{{$i}}" name="id{{$i}}" value="{{ $ans->id }}">
                        </div>
                        @endforeach
                        <input type="hidden" id="id" name="id" value="{{ $pretest->id }}">
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('CoursePretestManage/' . $courses->id . '/edit') }}" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</a>
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
