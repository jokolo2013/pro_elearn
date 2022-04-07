@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการบทเรียน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admins/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('coursemanage/') }}">จัดการคอร์สเรียน</a></li>
                        <li class="breadcrumb-item active">จัดการบทเรียน</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- Main Content --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row" style="background-color:#FFFFFF">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-warning mt-3" data-toggle="modal"
                                data-target="#creatlessons"><i class="fas fa-plus"></i> สร้างคอร์สเรียน</button><br>
                            <div class="modal fade" id="creatlessons" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">สร้างคอร์สเรียน
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <?= Form::open(['url' => 'lessonsmanage/', 'files' => false]) ?>
                                            <div class="form-group">
                                                <?= Form::label('lesson_sort', 'ลำดับบทเรียน') ?>
                                                <?= Form::number('lesson_sort', null, ['class' => 'form-control', 'placeholder' => 'ลำดับบทเรียน']) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= Form::label('lesson_name', 'ชื่อบทเรียน') ?>
                                                <?= Form::text('lesson_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อบทเรียน', 'rows' => '5']) ?>
                                            </div>
                                            <input type="hidden" id="id_course" name="id_course" value="{{$id}}">
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
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">แสดงข้อมูลบทเรียน จํานวนทั้งหมด {{ $lessons->count() }} บท
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>ลำดับบทเรียน</th>
                                                <th>ชื่อบทเรียน</th>
                                                <th>แก้ไขเนื้อหาในบทเรียน</th>
                                                <th>แก้ไขบทเรียน</th>
                                                <th>ลบบทเรียน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($lessons as $les)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $les->lesson_sort }}</td>
                                                    <td>{{ $les->lesson_name }}</td>
                                                    <td><a name="" id="" class="btn btn-dark" href="#" role="button"><i
                                                        class="fas fa-edit"></i> แก้ไขเนื้อหา</a></td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#editlesson<?= $i ?>"><i
                                                                class="fas fa-edit"></i> แก้ไขบทเรียน</button>
                                                        <div class="modal fade" id="editlesson<?= $i ?>" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            แก้ไขคอร์ส
                                                                            {{ $les->lesson_name }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        <?= Form::model($les, ['url' => 'lessonsmanage/' . $les->id, 'method' => 'put', 'files' => false]) ?>
                                                                        <div class="form-group">
                                                                            <?= Form::label('lesson_sort', 'ลำดับบทเรียน') ?>
                                                                            <?= Form::number('lesson_sort', null, ['class' => 'form-control', 'placeholder' => 'ลำดับบทเรียน']) ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <?= Form::label('lesson_name', 'ชื่อบทเรียน') ?>
                                                                            <?= Form::text('lesson_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อบทเรียน', 'rows' => '5']) ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">บันทึกข้อมูล</button>
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
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
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
                                                                        {{ $les->lesson_name }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก</button>
                                                                        <?= Form::open(['url' => 'lessonsmanage/' . $les->id, 'method' => 'delete']) ?>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">ลบ</button>
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
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
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
