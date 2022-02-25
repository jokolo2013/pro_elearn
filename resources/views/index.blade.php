@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-4 prcolor">
                <h1>คอร์สเรียนใหม่ของเรา</h1>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>

        <div class="row" style="background-color:#FFFFFF">
            <div class="col-lg-12 mt-2  shadow-sm">
                @include('slide')
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-lg-4 prcolor">
                <h1>คอร์สเรียน</h1>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
        </div>

        <div class="row" style="background-color:#FFFFFF">
            <div class="col-lg-12 mt-2">
                @include('courses')
            </div>
        </div>

    </div>
@endsection
