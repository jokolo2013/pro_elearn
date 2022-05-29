@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ผลการตอบคำถามแบบทดสอบก่อนเรียน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admins/') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('Resultpreposttest/') }}">ผลการตอบคำถาม</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $courses->course_name }}</li>
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
                @if ($pretestQ->count() == 0)
                    <br>
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="card-title">ไม่มีคำถามแบบทดสอบก่อนเรียนในตอนนี้</h4>
                        </div>
                    </div>
                @endif
                <?php $i = 0; ?>
                @foreach ($pretestQ as $Q)
                    <br>
                    <?php
                    $i++;
                    ?>
                    <div class="card shadow-md">
                        <div class="card-header bg-dark text-white">
                            คำถาม :: {{ $Q->pretest_question }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <u>คำตอบ</u>
                                    <p class="card-text">
                                        @foreach ($pretedtA as $a)
                                            @if ($a->question_id == $Q->id)
                                                คำตอบ :: {{ $a->pretest_answer }}<br>
                                                จำนวนคนที่ตอบ :: <h4>{{ $pretestR[$a->id]['count'] }}</h4><br>
                                                <hr>
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach
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
            swal("<?php echo session()->get('status'); ?>", "", "success"); <
            /sc>
            @endif
            @if (session()->has('success'))
                <
                script >
                    swal("<?php echo session()->get('success'); ?>", "", "success");
        </script>
    @endif
@endsection
