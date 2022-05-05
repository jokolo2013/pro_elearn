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
                            <h4><u>Background Template</u></h4>
                        </label><br>
                        <div class="form-check">
                            <div class="row">
                                    @foreach ($template_public as $template_pub)
                                        <div class="col-lg-4 shadow-sm">
                                            <label class="form-check-label form-check-inline mt-3">
                                                <input type="radio" class="form-check-input" name="certificate_image_background" id="certificate_image_background"
                                                    value="{{ $template_pub->id }}"
                                                    @if ($certificate_setting->certificate_template_id == $template_pub->id) checked @endif>
                                                <a href="{{ asset('images/certificate_template/' . $template_pub->certificate_image_background) }}"
                                                    target="_blank" data-lity>
                                                    <img src="{{ asset('images/certificate_template/' . $template_pub->certificate_image_background) }}"
                                                        style="width:250px">
                                                </a>
                                            </label><br>
                                        </div>
                                    @endforeach
                            </div>
                        </div><br>
                        <label>
                            <h4><u>Description</u></h4>
                        </label><br>
                        <div class="form-group">
                          <input type="text" class="form-control" name="description" id="description" value="{{$certificate_setting->description}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ url('CourseCertificate') }}" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</a>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
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
