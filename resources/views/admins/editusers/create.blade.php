@extends('admins.layouts.app')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">เพิ่มข้อมูลสมาชิก</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('admins/')}}">Home</a></li>
            <li class="breadcrumb-item active">เพิ่มข้อมูลสมาชิก</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card mt-3">
                    <div class="card-header h3">
                        เพิ่มข้อมูลสมาชิก
                    </div>

                    <div class="card-body">
                        <?= Form::open(['url' => 'editusers/', 'files' => true]) ?>
                        <div class="form-group">
                            <?= Form::label('Fname', 'ชื่อ') ?>
                            <?= Form::text('Fname', null, ['class' => 'form-control', 'placeholder' => 'ชื่อ','required']) ?>
                        </div>

                        <div class="form-group">
                            <?= Form::label('Lname', 'นามสกุล') ?>
                            <?= Form::text('Lname', null, ['class' => 'form-control', 'placeholder' => 'นามสกุล','required']) ?>
                        </div>

                        <div class="form-group">
                            <label for="Gender">เพศ</label>
                            <div class="col-md-6 mt-2">
                                <input type="radio" id="Gender_1" name="Gender" value="1" checked>
                                <label for="html">ชาย</label>
                                <input type="radio" id="Gender_2" name="Gender" value="2">
                                <label for="html">หญิง</label>
                                <input type="radio" id="Gender_3" name="Gender" value="3">
                                <label for="html">อื่นๆ</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= Form::label('tel', 'เบอร์โทรศัพท์') ?>
                            <?= Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'เบอร์โทรศัพท์','required']) ?>
                        </div>

                        <div class="form-group">
                            <?= Form::label('email', 'อีเมล') ?>
                            <?= Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'อีเมล','required']) ?>
                        </div>

                        <div class="form-group">
                            <label for="รหัสผ่าน">รหัสผ่าน</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            {!! Form::label('id_role', 'สถานะผู้ใช้งาน') !!}
                            <?= Form::select('id_role', App\Profile::all()->pluck('status_name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'เลือกสถานะสมาชิก']) ?>
                        </div>


                        <br>

                        <div class="form-group">
                            {!! Form::label('image', 'แก้ไขรูปภาพ') !!}
                            <?= Form::file('image', null, ['class' => 'form-control']) ?>
                        </div>

                        <div class="form-group">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                บันทึก
                            </button>
                            <a class="btn btn-danger" href="{{ route('editusers') }}" role="button">ยกเลิก</a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
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
                                        ต้องการบันทึกข้อมูล ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                        <?= Form::submit('บันทึก', ['class' => 'btn btn-primary ']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
