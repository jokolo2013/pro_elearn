<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/' . Auth::user()->pic_profile) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ Auth::user()->Fname }}
                    {{ Auth::user()->Lname }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-4">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/admins') }}"
                        class="nav-link <?= Request::segment(1) == 'admins' || Request::segment(1) == '' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('editusers') }}"
                        class="nav-link <?= Request::segment(1) == 'editusers' || Request::segment(1) == '' ? 'active' : '' ?>">
                        <i class=" fa fa-user nav-icon"></i>
                        <p>จัดการผู้ใช้งาน</p>
                    </a>
                </li>

                <li class="nav-item  menu-open">
                    <a href="#" class="nav-link
                    <?= Request::segment(1) == 'Register_coursesManage' || Request::segment(1) == '' ? 'active' : '' ?>
                    <?= Request::segment(1) == 'coursemanageRegister' || Request::segment(1) == '' ? 'active' : '' ?>
                    <?= Request::segment(1) == 'coursemanageLesson' || Request::segment(1) == '' ? 'active' : '' ?>
                    <?= Request::segment(1) == 'coursemanage' || Request::segment(1) == '' ? 'active' : '' ?>
                    <?= Request::segment(1) == 'lessonsmanage' || Request::segment(1) == '' ? 'active' : '' ?>
                    <?= Request::segment(1) == 'lessonsfilevideo' || Request::segment(1) == '' ? 'active' : '' ?>
                    <?= Request::segment(1) == 'coursemanageTest' || Request::segment(1) == '' ? 'active' : '' ?>
                    <?= Request::segment(1) == 'CoursePretestManage' || Request::segment(1) == '' ? 'active' : '' ?>
                    ">

                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            จัดการคอร์สเรียน
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('coursemanage')}}" class="nav-link
                            <?= Request::segment(1) == 'coursemanage' || Request::segment(1) == '' ? 'active' : '' ?>
                             ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการคอร์สเรียน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('coursemanageLesson')}}" class="
                            nav-link
                            <?= Request::segment(1) == 'coursemanageLesson' || Request::segment(1) == '' ? 'active' : '' ?>
                            <?= Request::segment(1) == 'lessonsmanage' || Request::segment(1) == '' ? 'active' : '' ?>
                            <?= Request::segment(1) == 'lessonsfilevideo' || Request::segment(1) == '' ? 'active' : '' ?>
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการบทเรียน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('coursemanageRegister')}}" class="
                            nav-link
                            <?= Request::segment(1) == 'coursemanageRegister' || Request::segment(1) == '' ? 'active' : '' ?>
                            <?= Request::segment(1) == 'Register_coursesManage' || Request::segment(1) == '' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการผู้ลงทะเบียนคอร์ส</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('coursemanageTest')}}" class="nav-link
                            <?= Request::segment(1) == 'coursemanageTest' || Request::segment(1) == '' ? 'active' : '' ?>
                            <?= Request::segment(1) == 'CoursePretestManage' || Request::segment(1) == '' ? 'active' : '' ?>
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการข้อสอบ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการเกียรติบัตร</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- Sidebar Menu -->

    </div>
    <!-- /.sidebar -->
</aside>
