@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการพื้นหลังเกียรติบัตร</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admins/')}}">Home</a></li>
                        <li class="breadcrumb-item active">จัดการพื้นหลังเกียรติบัตร</li>
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
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#creatcourse"><i class="fas fa-plus"></i> เพิ่มรูปภาพพื้นหลัง</button>
                <div class="modal fade" id="creatcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพพื้นหลัง
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-left">
                                <?= Form::open(['url' => 'certificatebackground/', 'files' => true]) ?>
                                <?php if(Auth::user()->id_role == 0){ ?>
                                <div class="form-group">
                                    <label>ตั้งค่าความเป็นส่วนตัว</label>
                                    <select class="form-control" name="publish" id="publish">
                                      <option value="0">ส่วนตัว</option>
                                      <option value="1" selected>สาธารณะ</option>
                                    </select>
                                  </div>
                                <?php }else{ ?>
                                    <input type="hidden" name="publish" id="publish" value="0">
                                <?php } ?>
                                <div class="form-group">
                                    {!! Form::label('certificate_image_background', 'เพิ่มรูปภาพ') !!}
                                    <?= Form::file('certificate_image_background', ['class' => 'form-control','accept=".jpg, .jpeg, .png"','required']) ?>
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">เพิ่มรูปภาพพื้นหลัง</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header h3 text-dark">
                        <div class="row">
                            <div class="col-8">แสดงข้อมูลพื้นหลัง จํานวนทั้งหมด {{ $certi_bg->count() }} ภาพ
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped text-center" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ภาพพื้นหลัง</th>
                                <th>ผู้อัพโหลด</th>
                                <th>สถานะ</th>
                                <th>ลบ</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach ($certi_bg as $result)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <a href="{{ asset('images/certificate_template/' . $result->certificate_image_background) }}"
                                            target="_blank" data-lity>
                                            <img src="{{ asset('images/certificate_template/' . $result->certificate_image_background) }}"
                                                style="width:150px">
                                        </a>
                                    </td>
                                    <td>
                                        {{ $result->Fname }} {{ $result->Lname }}
                                    </td>
                                    <td>
                                        <?php
                                            if($result->publish==1){
                                                echo "สาธารณะ";
                                            }
                                            if($result->publish==0){
                                                echo "ส่วนตัว";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                         <!-- Button trigger modal -->
                                         <button type="button" class="btn btn-danger" data-toggle="modal"
                                         data-target="#delete<?= $i?>"><i class="fas fa-trash-alt"></i> ลบ
                                     </button>
                                     <!-- Modal -->
                                     <div class="modal fade" id="delete<?= $i ?>" tabindex="-1" role="dialog"
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
                                                     ต้องการลบพื้นหลัง <b>{{$result->certificate_image_background}}</b>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                         data-dismiss="modal">ยกเลิก</button>
                                                     <?= Form::open(['url' => 'certificatebackground/' . $result->id, 'method' => 'delete']) ?>
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
    @if (session()->has('status'))
        <script>
            swal("<?php echo session()->get('status'); ?>", "", "success");
        </script>
    @endif
@endsection
