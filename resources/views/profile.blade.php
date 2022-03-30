@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-5 ml-5">
                <h1 style="color:#F77100">โปรไฟล์</h1>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>


        <?= Form::model($users, ['url' => 'profile/' . $users->id, 'method' => 'put', 'files' => true, 'name' => 'editprofile']) ?>


        <div class="row" style="background-color:#FFFFFF">

            <div class="col-lg-2 mt-2 ">
                @if (count($errors) > 0)
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-4 mt-2 d-flex justify-content-center">
                <div class="grid">
                    <div class="row mt-5">
                        <div class="col">
                            <a href="{{ asset('images/' . $users->pic_profile) }}" data-lity>
                                <img src="{{ asset('images/' . $users->pic_profile) }}" class="rounded w-100"
                                    alt="pic_profile">
                            </a>

                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col">
                            <?= Form::file('image', null, ['class' => 'form-control']) ?>
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col">
                            <label for="">สถานะบัญชี</label>
                            <input type="text" class="form-control" name="id_role" id="id_role"
                                value="{{ $profile->status_name }}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-2 ">
                <div class="grid">

                    <div class="row">
                        <div class="form-row w-100  mt-2">
                            <div class="col">
                                <?= Form::label('Fname', 'ชื่อ') ?>
                                <?= Form::text('Fname', null, ['class' => 'form-control', 'placeholder' => 'ชื่อ', 'required']) ?>
                            </div>
                            <div class="col">
                                <?= Form::label('Lname', 'นามสกุล') ?>
                                <?= Form::text('Lname', null, ['class' => 'form-control', 'placeholder' => 'นามสกุล', 'required']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="form-group w-100">
                            <?= Form::label('email', 'อีเมล') ?>
                            <?= Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'อีเมล', 'required']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group w-100">
                            <?= Form::label('tel', 'เบอร์โทรศัพท์') ?>
                            <?= Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'เบอร์โทรศัพท์', 'required']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group w-100">
                            <?= Form::label('password_old', 'รหัสผ่านเดิม') ?>
                            <?= Form::input('password', 'password_old', null, ['class' => 'form-control', 'placeholder' => 'รหัสผ่านเดิม']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group w-100">
                            <?= Form::label('password_new', 'รหัสผ่านใหม่') ?>
                            <?= Form::input('password', 'password_new', null, ['class' => 'form-control', 'placeholder' => 'รหัสผ่านใหม่']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group w-100">
                            <?= Form::label('password', 'ยืนยันรหัสผ่านใหม่') ?>
                            <?= Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'ยืนยันรหัสผ่านใหม่']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group w-100">
                            <?= Form::submit('บันทึก', ['class' => 'btn btn-primary w-100']) ?>
                            <a href="{{ Route('index') }}" type="button" class="btn btn-danger w-100 mt-2">ยกเลิก</a>
                        </div>
                    </div>


                    {!! Form::close() !!}

                </div>
            </div>

            <div class="col-lg-2 mt-2 ">

            </div>
        </div>
        <hr>

        <!-- Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark border-dark">
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body bg-dark p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
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
