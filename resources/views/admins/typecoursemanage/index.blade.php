@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการประเภทบทเรียน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admins') }}">Home</a></li>
                        <li class="breadcrumb-item active">จัดการประเภทบทเรียน</li>
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
                <button type="button" class="btn btn-warning mt-3" data-toggle="modal" data-target="#creatlessons"><i
                        class="fas fa-plus"></i> เพิ่มประเภทคอร์สเรียน</button><br>
                <div class="modal fade" id="creatlessons" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทคอร์สเรียน
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left">
                                <?= Form::open(['url' => 'managetypecourses/', 'files' => false]) ?>
                                <div class="form-group">
                                    <?= Form::label('courses_type_name', 'ชื่อประเภทคอร์สเรียน') ?>
                                    <?= Form::text('courses_type_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อประเภทคอร์สเรียน', 'required']) ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">เพิ่มประเภทคอร์สเรียน</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        <div class="row">
                            <div class="col-8">แสดงข้อมูลประเภทคอร์สเรียนจำนวน ประเภท
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped w-100 text-center" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อประเภทคอร์สเรียน</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($Courses_type as $type)
                                    <?php $i++; ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>{{ $type->courses_type_name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#editlesson<?= $i ?>"><i class="fas fa-edit"></i>
                                                แก้ไขประเภทคอร์สเรียน</button>
                                            <div class="modal fade" id="editlesson<?= $i ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                แก้ไขประเภทคอร์สเรียน :
                                                                {{ $type->courses_type_name }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <?= Form::model($type, ['url' => 'managetypecourses/' . $type->id, 'method' => 'put', 'files' => false]) ?>
                                                            <div class="form-group">
                                                                <?= Form::label('courses_type_name', 'ชื่อประเภทคอร์สเรียน') ?>
                                                                <?= Form::text('courses_type_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อประเภทคอร์สเรียน', 'required']) ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">แก้ไข</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal<?= $i ?>">
                                                ลบ
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                แจ้งเตือน</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ต้องการลบ <i class="fas fa-arrow-right"></i>
                                                            {{ $type->courses_type_name }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">ยกเลิก</button>
                                                            <?= Form::open(['url' => 'managetypecourses/' . $type->id, 'method' => 'delete']) ?>
                                                            <button type="submit" class="btn btn-danger">ลบ</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
    @if (session()->has('faile'))
        <script>
            swal("<?php echo session()->get('faile'); ?>", "", "error");
        </script>
    @endif
    @if (session()->has('add'))
        <script>
            swal("<?php echo session()->get('add'); ?>", "", "success");
        </script>
    @endif
    @if (session()->has('delete'))
        <script>
            swal("<?php echo session()->get('delete'); ?>", "", "success");
        </script>
    @endif
@endsection
