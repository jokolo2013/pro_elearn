@extends('admins.layouts.app')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">จัดการเนื้อหาในบทเรียนของ</h1><br>
          <h4> {{$courseName->course_name}} / {{$lessonsName->lesson_name}}</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admins/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('coursemanageLesson/') }}">จัดการบทเรียน</a></li>
            <li class="breadcrumb-item"><a href="{{ url('lessonsmanage/'.$courseName->id.'/edit') }}">{{$courseName->course_name}}</a></li>
            <li class="breadcrumb-item active">จัดการเนื้อหาในบทเรียน</li>
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
                                data-target="#creatlessons"><i class="fas fa-plus"></i> เพิ่มวิดีโอในบทเรียน</button><br>
                            <div class="modal fade" id="creatlessons" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มวิดีโอในบทเรียน
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <?= Form::open(['url' => 'lessonsfilevideo/', 'files' => false]) ?>
                                            <div class="form-group">
                                                <?= Form::label('lesson_video_name', 'ชื่อวิดีโอ') ?>
                                                <?= Form::text('lesson_video_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อวิดีโอ','required']) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= Form::label('lesson_video_path', 'ลิ้งวิดีโอ') ?>
                                                <?= Form::text('lesson_video_path', null, ['class' => 'form-control', 'placeholder' => 'ลิ้งวิดีโอ','required']) ?>
                                            </div>
                                            <input type="hidden" id="Video_Type" name="Video_Type" value="Video_Type">
                                            <input type="hidden" id="Video_id_course" name="Video_id_course" value="{{$courseName->id}}">
                                            <input type="hidden" id="Video_lessons_id" name="Video_lessons_id" value="{{$lessonsName->id}}">
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
                                    <h3 class="card-title">แสดงข้อมูลวิดีโอในบทเรียนจำนวน {{ $lessonsVideo->count() }} วิดีโอ
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อวิดีโอ</th>
                                                <th>ลิ้งวิดีโอ</th>
                                                <th>แก้ไข</th>
                                                <th>ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($lessonsVideo as $lesVideo)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td>{{ $lesVideo->lesson_video_name }}</td>
                                                    <td>{{ $lesVideo->lesson_video_path }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#editlessonVideo<?= $i ?>"><i
                                                                class="fas fa-edit"></i> แก้ไขวิดีโอ</button>
                                                        <div class="modal fade" id="editlessonVideo<?= $i ?>" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            แก้ไขวิดีโอ
                                                                            {{ $lesVideo->lesson_video_name }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        <?= Form::model($lesVideo, ['url' => 'lessonsfilevideo/' . $lesVideo->id, 'method' => 'put', 'files' => false]) ?>
                                                                        <div class="form-group">
                                                                            <?= Form::label('lesson_video_name', 'ชื่อวิดีโอ') ?>
                                                                            <?= Form::text('lesson_video_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อวิดีโอ','required']) ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <?= Form::label('lesson_video_path', 'ลิ้งวิดีโอ') ?>
                                                                            <?= Form::text('lesson_video_path', null, ['class' => 'form-control', 'placeholder' => 'ลิ้งวิดีโอ','required']) ?>
                                                                        </div>
                                                                        <input type="hidden" id="Video_Type" name="Video_Type" value="Video_Type">
                                                                        <input type="hidden" id="Video_id_course" name="Video_id_course" value="{{$courseName->id}}">
                                                                        <input type="hidden" id="Video_lessons_id" name="Video_lessons_id" value="{{$lessonsName->id}}">
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
                                                            data-target="#DeleteVideo<?= $i ?>">
                                                            ลบ
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="DeleteVideo<?= $i ?>" tabindex="-1"
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
                                                                        ต้องการลบวิดีโอ <i class="fas fa-arrow-right"></i>
                                                                        {{ $lesVideo->lesson_video_name }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก</button>
                                                                        <?= Form::open(['url' => 'lessonsfilevideo/' . $lesVideo->id, 'method' => 'delete']) ?>
                                                                        <input type="hidden" id="delete_Video" name="delete_Video" value="delete_Video">
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
                            <hr>
                            <button type="button" class="btn btn-info " data-toggle="modal"
                                data-target="#lessonsVideo"><i class="fas fa-plus"></i> เพิ่มไฟล์ในบทเรียน</button><br>
                            <div class="modal fade" id="lessonsVideo" tabindex="-1" role="dialog"
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
                                            <?= Form::open(['url' => 'lessonsfilevideo/', 'files' => true]) ?>
                                            <div class="form-group">
                                                <?= Form::label('lesson_files_name', 'ชื่อไฟล์') ?>
                                                <?= Form::text('lesson_files_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อไฟล์']) ?>
                                            </div>
                                            <div class="form-group">
                                                <?= Form::label('lesson_files_path', 'อัพโหลดไฟล์') ?>
                                                <?= Form::file('lesson_files_path', null, ['class' => 'form-control']) ?>
                                            </div>
                                            <input type="hidden" id="File_Type" name="File_Type" value="File_Type">
                                            <input type="hidden" id="File_id_course" name="File_id_course" value="{{$courseName->id}}">
                                            <input type="hidden" id="File_lessons_id" name="File_lessons_id" value="{{$lessonsName->id}}">
                                            <input type="hidden" id="Course_name" name="Course_name" value="{{$courseName->course_name}}">
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
                                    <h3 class="card-title">แสดงข้อมูลไฟล์ในบทเรียนจำนวน {{ $lessonsFile->count() }} ไฟล์
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example3" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อไฟล์</th>
                                                <th>ไฟล์</th>
                                                <th>แก้ไข</th>
                                                <th>ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($lessonsFile as $lesFile)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td>{{ $lesFile->lesson_files_name }}</td>
                                                    <td>
                                                        <a href="{{ url('/storage/'.$courseName->course_name.'/'.$lesFile->lesson_files_path) }}" target="_blank">{{$lesFile->lesson_files_path}}</a>
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#editlessonFile<?= $i ?>"><i
                                                                class="fas fa-edit"></i> แก้ไขไฟล์</button>
                                                        <div class="modal fade" id="editlessonFile<?= $i ?>" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            แก้ไขไฟล์
                                                                            {{ $lesFile->lesson_files_name }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-left">
                                                                        <?= Form::model($lesFile, ['url' => 'lessonsfilevideo/' . $lesFile->id, 'method' => 'put', 'files' => true]) ?>
                                                                        <?= Form::open(['url' => 'lessonsfilevideo/', 'files' => true]) ?>
                                                                        <div class="form-group">
                                                                            <?= Form::label('lesson_files_name', 'ชื่อไฟล์') ?>
                                                                            <?= Form::text('lesson_files_name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อไฟล์']) ?>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>ไฟล์เดิม</label>
                                                                            <a href="{{ url('/storage/'.$courseName->course_name.'/'.$lesFile->lesson_files_path) }}" target="_blank">{{$lesFile->lesson_files_path}}</a>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <?= Form::label('lesson_files_path', 'อัพโหลดไฟล์') ?>
                                                                            <?= Form::file('lesson_files_path', null, ['class' => 'form-control']) ?>
                                                                        </div>
                                                                        <input type="hidden" id="File_Type" name="File_Type" value="File_Type">
                                                                        <input type="hidden" id="File_id_course" name="File_id_course" value="{{$courseName->id}}">
                                                                        <input type="hidden" id="File_lessons_id" name="File_lessons_id" value="{{$lessonsName->id}}">
                                                                        <input type="hidden" id="Course_name" name="Course_name" value="{{$courseName->course_name}}">
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
                                                            data-target="#deleteFile<?= $i ?>">
                                                            ลบ
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteFile<?= $i ?>" tabindex="-1"
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
                                                                        ต้องการลบไฟล์ <i class="fas fa-arrow-right"></i>
                                                                        {{ $lesFile->lesson_files_name }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">ยกเลิก</button>
                                                                        <?= Form::open(['url' => 'lessonsfilevideo/' . $lesFile->id, 'method' => 'delete']) ?>
                                                                        <input type="hidden" id="delete_File" name="delete_File" value="delete_File">
                                                                        <input type="hidden" id="Course_name" name="Course_name" value="{{$courseName->course_name}}">
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
