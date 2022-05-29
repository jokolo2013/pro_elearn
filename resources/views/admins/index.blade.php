@extends('admins.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">หน้าแรก</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admins') }}">Home</a></li>
                        <li class="breadcrumb-item active">หน้าแรก</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- Main Content --}}
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $alluser->count() }}</h3>

                            <p>จำนวนผู้ใช้งานในระบบ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="
                        <?php if(Auth::user()->id_role == 0) { ?>
                        {{ route('editusers') }}
                        <?php }else{ ?>
                            #
                            <?php } ?>
                        " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $courses->count() }}</h3>

                            <?php if(Auth::user()->id_role == 0) { ?>
                            <p>จำนวนคอร์สในระบบ</p>
                            <?php }else{ ?>
                            <p>จำนวนคอร์สของฉัน</p>
                            <?php } ?>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('coursemanage') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">

            </div>
        </div>
    </div>
@endsection
@section('footer')
@if (session()->has('error'))
    <script>
        swal("<?php echo session()->get('error'); ?>", "", "error");
    </script>
@endif
@endsection
