@extends('layouts.app')
@section('style')
    <style>
        @media (max-width: 768px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* display 3 */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-right.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(33.333%);
            }

            .carousel-inner .carousel-item-left.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-33.333%);
            }
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left {
            transform: translateX(0);
        }

    </style>
@endsection
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
            <div class="col-lg-12 mt-2 shadow-sm">
                @include('courses')
            </div>
        </div>

    </div>
@endsection
@section('footer')
    <script>
        $('#recipeCarousel').carousel({
            interval: 5000
        })

        $('.carousel .carousel-item').each(function() {
            var minPerSlide = 3;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>

    @if (session()->has('sendpretest'))
        <script>
            swal("<?php echo session()->get('sendpretest'); ?>", "", "success");
        </script>
    @endif
    @if (session()->has('success'))
    <script>
        swal("<?php echo session()->get('success'); ?>", "", "success");
    </script>
@endif
    @if (session()->has('error'))
    <script>
        swal("<?php echo session()->get('error'); ?>", "", "error");
    </script>
@endif
@endsection
