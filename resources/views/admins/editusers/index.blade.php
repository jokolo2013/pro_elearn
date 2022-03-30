@extends('admins.layouts.app')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">จัดการผู้ใช้งาน</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">จัดการผู้ใช้งาน</li>
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
                <?= link_to('editusers/create', $title = ' + เพิ่มผู้ใช้งาน', ['class' => 'btn btn-primary'], $secure = null) ?>

                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        แสดงข้อมูลผู้ใช้งาน จํานวนทั้งหมด {{ $users->total() }} คน
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tr>
                                <th>#</th>
                                <th>รหัสสมาชิก</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เพศ</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>อีเมล</th>
                                <th>สถานะ</th>
                                <th>รูปโปรไฟล์</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                            <?php $i = 0; ?>
                            @foreach ($users as $user)
                                <?php $i++; ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->Fname }}</td>
                                    <td>{{ $user->Lname }}</td>
                                    <td>
                                        @if ($user->Gender == 1)
                                            ชาย
                                        @endif
                                        @if ($user->Gender == 2)
                                            หญิง
                                        @endif
                                        @if ($user->Gender == 3)
                                            อื่นๆ
                                        @endif
                                    </td>
                                    <td>{{ $user->tel }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{ $user->profile->status_name }}
                                    </td>
                                    <td>
                                        <a href="{{ asset('images/' . $user->pic_profile) }}" data-lity>
                                            <img src="{{ asset('images/resize/' . $user->pic_profile) }}"
                                                style="width:50px">
                                        </a>
                                    </td>
                                    <td>
                                        <?= link_to('editusers/' . $user->id . '/edit', 'แก้ไข', ['class' => 'btn btn-primary'], $secure = null) ?>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal<?=$i?>">
                                            ลบ
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?=$i?>" tabindex="-1" role="dialog"
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
                                                        ต้องการลบข้อมูลผู้ใช้งาน {{ $user->Fname }} {{ $user->Lname }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก</button>
                                                        <?= Form::open(['url' => 'editusers/' . $user->id, 'method' => 'delete']) ?>
                                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <br>
                        {{ $users->links() }}
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
