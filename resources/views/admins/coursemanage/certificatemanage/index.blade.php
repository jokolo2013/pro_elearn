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
                        <li class="breadcrumb-item"><a href="{{ url('admins/') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ url('CourseCertificate/') }}">จัดการเกียรติบัตร</a>
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
                <br>
                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        <div class="row">
                            <div class="col-8"> จัดการเกียรติบัตรคอร์ส <b>[{{ $courses->course_name }}]</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <label>
                            <h4><u>Background Template ของระบบ</u></h4>
                        </label><br>
                        <div class="form-check d-flex justify-content-center">
                            <div class="row">
                                @foreach ($template_public as $template_pub)
                                    <?= Form::model($template_pub, ['url' => 'CourseCertificateManage/' . $certificate_setting->id, 'method' => 'put', 'files' => false]) ?>
                                    <div class="col-lg-4 shadow-sm">
                                        <label class="form-check-label form-check-inline mt-3">
                                            <input type="radio" class="form-check-input" name="certificate_template_id"
                                                id="certificate_template_id" value="{{ $template_pub->id }}"
                                                @if ($certificate_setting->certificate_template_id == $template_pub->id) checked @endif>
                                            <a href="{{ asset('images/certificate_template/' . $template_pub->certificate_image_background) }}"
                                                target="_blank" data-lity>
                                                <img src="{{ asset('images/certificate_template/' . $template_pub->certificate_image_background) }}"
                                                    style="width:350px">
                                            </a>
                                        </label><br>
                                    </div>
                                @endforeach
                            </div>
                        </div><br><hr>
                        <label>
                            <h4><u>Background Template ของฉัน</u></h4>
                        </label><br>
                        <div class="form-check d-flex justify-content-center">
                            <div class="row">
                                @if($template_private->count() == 0)
                                    <h4><u>ไม่มีพื้นหลังของฉันในตอนนี้ <a href="{{ route('certificatebackground') }}">คลิกที่นี้เพื่อเพิ่มพื้นหลัง</a></u></h4>
                                @endif
                                @foreach ($template_private as $template_pri)
                                    <?= Form::model($template_pri, ['url' => 'CourseCertificateManage/' . $certificate_setting->id, 'method' => 'put', 'files' => false]) ?>
                                    <div class="col-lg-4 shadow-sm">
                                        <label class="form-check-label form-check-inline mt-3">
                                            <input type="radio" class="form-check-input" name="certificate_template_id"
                                                id="certificate_template_id" value="{{ $template_pri->id }}"
                                                @if ($certificate_setting->certificate_template_id == $template_pri->id) checked @endif>
                                            <a href="{{ asset('images/certificate_template/' . $template_pri->certificate_image_background) }}"
                                                target="_blank" data-lity>
                                                <img src="{{ asset('images/certificate_template/' . $template_pri->certificate_image_background) }}"
                                                    style="width:150px">
                                            </a>
                                        </label><br>
                                    </div>
                                @endforeach
                            </div>
                        </div><br><hr>
                        <label>
                            <h4><u>Description</u></h4>
                        </label><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" id="description"
                                value="{{ $certificate_setting->description }}">
                        </div>
                    </div>
                </div>
                <input name="courses_id" id="courses_id" type="hidden" value="{{ $courses->id }}">
                <div class="modal-footer">
                    <a href="{{ url('CourseCertificate') }}" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</a>
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
    @if (session()->has('success'))
        <script>
            swal("<?php echo session()->get('success'); ?>", "", "success");
        </script>
    @endif
@endsection
