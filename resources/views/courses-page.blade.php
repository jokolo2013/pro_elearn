@extends('layouts.app')
@section('style')
    <style>
        .control {
            font-family: arial;
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 15px;
            padding-top: 0px;
            cursor: pointer;
            font-size: 16px;
        }

        .control input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }

        .control_indicator {
            position: absolute;
            top: 2px;
            left: 0;
            height: 20px;
            width: 20px;
            background: #e6e6e6;
            border: 0px solid #000000;
            border-radius: undefinedpx;
        }

        .control:hover input~.control_indicator,
        .control input:focus~.control_indicator {
            background: #cccccc;
        }

        .control input:checked~.control_indicator {
            background: #2aa1c0;
        }

        .control:hover input:not([disabled]):checked~.control_indicator,
        .control input:checked:focus~.control_indicator {
            background: #0e6647d;
        }

        .control input:disabled~.control_indicator {
            background: #e6e6e6;
            opacity: 0.6;
            pointer-events: none;
        }

        .control_indicator:after {
            box-sizing: unset;
            content: '';
            position: absolute;
            display: none;
        }

        .control input:checked~.control_indicator:after {
            display: block;
        }

        .control-radio .control_indicator {
            border-radius: 50%;
        }

        .control-radio .control_indicator:after {
            left: 7px;
            top: 7px;
            height: 6px;
            width: 6px;
            border-radius: 50%;
            background: #ffffff;
            transition: background 250ms;
        }

        .control-radio input:disabled~.control_indicator:after {
            background: #7b7b7b;
        }

        .control-radio .control_indicator::before {
            content: '';
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 4.5rem;
            height: 4.5rem;
            margin-left: -1.3rem;
            margin-top: -1.3rem;
            background: #2aa1c0;
            border-radius: 3rem;
            opacity: 0.6;
            z-index: 99999;
            transform: scale(0);
        }

        @keyframes s-ripple {
            0% {
                opacity: 0;
                transform: scale(0);
            }

            20% {
                transform: scale(1);
            }

            100% {
                opacity: 0.01;
                transform: scale(1);
            }
        }

        @keyframes s-ripple-dup {
            0% {
                transform: scale(0);
            }

            30% {
                transform: scale(1);
            }

            60% {
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(1);
            }
        }

        .control-radio input+.control_indicator::before {
            animation: s-ripple 250ms ease-out;
        }

        .control-radio input:checked+.control_indicator::before {
            animation-name: s-ripple-dup;
        }

    </style>
@endsection
@section('content')
    <div class="container" style="margin-bottom:20%">
        {{-- <h4><a href="{{url('/')}}" class="stretched-link text-orange">Home </a>/ <?= $courses_page->course_name ?></h4> --}}
        <div class="row mt-5">
            <div class="col-lg-8">
                <iframe width="100%" height="400" src="<?= $courses_page->course_videos ?>" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
                <h1 class="mt-5">
                    ชื่อคอร์ส : <?= $courses_page->course_name ?> #<?= $courses_page_type->courses_type_name ?>
                </h1>
            </div>

            <div class="col-lg-4">
                <div class="card w-75 ml-5">
                    <a href="{{ asset('images/course/cover/' . $courses_page->course_images) }}" data-lity>
                        <img class="card-img-top"
                            src="{{ asset('images/course/cover/' . $courses_page->course_images) }}"
                            alt="<?= $courses_page->course_name ?>">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title"><?= $courses_page->course_name ?>
                            #<?= $courses_page_type->courses_type_name ?></h4>
                        <p class="card-text">
                            <?= $courses_page->course_detail ?>
                        </p>
                        <hr>
                        <p class="card-text">
                            <i class="fas fa-book"></i> บทเรียนจำนวน <?= $lessonCount ?> บทเรียน <br> <i
                                class="far fa-clock"></i> <?= $courses_page->course_times ?>
                            ชั่วโมง
                        </p>
                    </div>
                    <?php if($register_course == null){?>
                    <?php if(Auth::user()){?>
                    <?= Form::open(['url' => 'courses-page/', 'files' => false]) ?>
                    <input type="hidden" id="id_course" name="id_course" value="<?php echo $courses_page->id; ?>">
                    <input type="hidden" id="id_users" name="id_users" value="{{ Auth::user()->id }}">
                    <div class="card-footer">
                        <button type="submit" class="btn text-white w-100"
                            style="background-color:#F77100">ลงทะเบียน</button>
                    </div>
                    {!! Form::close() !!}
                    <?php }else{ ?>
                    <div class="card-footer">
                        <a href="{{ route('login') }}" class="btn text-white w-100"
                            style="background-color:#F77100">กรุณาเข้าสู่ระบบก่อนลงทะเบียน</a>
                    </div>
                    <?php } ?>
                    <?php }else{ ?>
                    <div class="card-footer">
                        <button type="button" class="btn text-white w-100" style="background-color:#3a3a3a"> <i
                                class="fas fa-check"></i> ลงทะเบียนแล้ว</button>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card" style="border: none;">
                    <div class="card-body">
                        <h3 class="card-title"><u>รายละเอียด</u></h3>
                        <table style="margin-left:30%">
                            <tr>
                                <td><i class="fas fa-book fa-2x"></i> <?= $lessonCount ?> บทเรียน
                                </td>
                                <td><i class="far fa-clock fa-2x ml-5" style="color:#F77100"></i>
                                    <?= $courses_page->course_times ?> ชั่วโมง</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-paperclip fa-2x" style="color:#F77100"></i> 1 ไฟล์ประกอบการเรียน</td>
                                <td><i class="fas fa-level-up-alt fa-2x ml-5" style="color:#F77100"></i> ระดับความยาก :
                                    <?php if ($courses_page->course_difficulty == 0) {
                                        echo 'ง่าย';
                                    } elseif ($courses_page->course_difficulty == 1) {
                                        echo 'ปานกลาง';
                                    } else {
                                        echo 'ยาก';
                                    } ?>
                                </td>
                            </tr>
                        </table>
                        <p class="card-text mt-2">
                        <h4>สิ่งที่จะได้เรียนรู้</h4>
                        </p>
                        <p>
                        <table class="table">
                            <tr>
                                <td><i class="fas fa-check fa-2x" style="color:#F77100"></i></td>
                                <td><?= $courses_page->course_will_learn ?></td>
                            </tr>
                        </table>
                        </p>
                        <p class="card-text mt-2">
                        <h4>วัตถุประสงค์</h4>
                        <table class="table">
                            <tr>
                                <td>-</td>
                                <td><?= $courses_page->course_objective ?></td>
                            </tr>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <?php if($register_course == null){
        ?>
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="card" style="border: none;">
                    <div class="card-body">
                        <h4 class="card-title">รายละเอียดบทเรียน</h4>
                        <p class="card-text">

                            <?php $i = 0; ?>
                            <?php if ($lessonCount == 0) {
                                echo '<h4><center><u>ไม่มีบทเรียนในตอนนี้</u></center></h4>';
                            } ?>

                        <div class="accordion" id="accordionExample">
                            <div class="card" style="background-color: #949494">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-dark" type="button"
                                            data-toggle="collapse" data-target="#pretest" aria-expanded="true"
                                            aria-controls="pretest">
                                            <i class="fas fa-arrow-right" style="color:#F77100"></i>
                                            <b>แบบทดสอบก่อนเรียน</b>
                                            (เนื้อหาถูกล็อคเนื่องจากยังไม่ได้ลงทะเบียนคอร์ส)
                                        </button>
                                    </h2>
                                </div>

                                <?php if($pretest == null){?>
                                <div id="pretest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <h4>
                                            <center><u>ไม่มีแบบทดสอบก่อนเรียนในตอนนี้</u></center>
                                        </h4>
                                        </button>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div id="pretest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ol>
                                            <li>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" style="pointer-events: none;">
                                                    <i class="fas fa-question"></i> คลิกเพื่อทำแบบทดสอบก่อนเรียน
                                                </button>
                                            </li>
                                        </ol>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <?= Form::open(['url' => 'courses-page/sendPretest', 'files' => false]) ?>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">แบบทดสอบก่อนเรียน
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-8">
                                                                <?php $i = 0; ?>
                                                                @foreach ($pretest as $pt)
                                                                    <?php $i++; ?>
                                                                    <div class="form-group">
                                                                        <label>
                                                                            <h4>{{ $i . '.  ' . $pt->pretest_question }}
                                                                            </h4>
                                                                        </label>
                                                                        @foreach ($pretest_ans as $ans)
                                                                            <?php if($ans->question_id == $pt->id){ ?>
                                                                            <div class="control-group">
                                                                                <label class="control control-radio">
                                                                                    {{ $ans->pretest_answer }}
                                                                                    <input type="radio"
                                                                                        name="ans_pretest{{ $i }}"
                                                                                        value="{{ $ans->id }}">
                                                                                    <input type="hidden"
                                                                                        name="quest_pretest{{ $i }}"
                                                                                        value="{{ $pt->id }}">
                                                                                    <div class="control_indicator"></div>
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        @endforeach
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                                <input type="hidden" name="loop" id="loop"
                                                                    value="{{ $i }}">
                                                                <input type="hidden" name="courses_id" id="courses_id"
                                                                    value="{{ $courses_page->id }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-2"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">ส่งคำตอบ</button>

                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>


                        @foreach ($lesson as $ls)
                            <div class="accordion" id="accordionExample">
                                <div class="card" style="background-color: #949494">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left text-dark" type="button"
                                                data-toggle="collapse" data-target="#collapseOne<?= $i ?>"
                                                aria-expanded="true" aria-controls="collapseOne<?= $i ?>">
                                                <i class="fas fa-arrow-right" style="color:#F77100"></i>
                                                <b><?= $ls->lesson_name ?></b>
                                                (เนื้อหาถูกล็อคเนื่องจากยังไม่ได้ลงทะเบียนคอร์ส)
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne<?= $i ?>" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <h4><b><u><i class="fa-solid fa-circle-play"></i> Video </u></b></h4>
                                            <ol>
                                                @foreach ($lessonVideo as $lesVideo)
                                                    <?php if($lesVideo->lessons_id == $ls->id){?>

                                                    <li>
                                                        <p style="pointer-events: none;"><button type="button"
                                                                class="btn"
                                                                style="background-color:#F77100;color:white"
                                                                data-toggle="modal" data-target="#videoModal<?= $i ?>"
                                                                data-video="<?= $lesVideo->lesson_video_path ?>"><i
                                                                    class="fab fa-youtube text-white"></i>
                                                                <?= $lesVideo->lesson_video_name ?></button></p>
                                                    </li>

                                                    <?php }else{

                                                } ?>
                                                @endforeach
                                            </ol>
                                            <hr>
                                            <h4><b><u><i class="fa-solid fa-file"></i> File </u></b></h4>
                                            <ol>
                                                @foreach ($lessonFile as $lesFile)
                                                    <?php if($lesFile->lessons_id == $ls->id){?>
                                                    <li style="pointer-events: none;">
                                                        <a class="btn btn-primary"
                                                            href="{{ url('/storage/' . $courses_page->course_name . '/' . $lesFile->lesson_files_path) }}"
                                                            target="_blank" role="button"><i class="fa-solid fa-file"></i>
                                                            <?= $lesFile->lesson_files_name ?></a>
                                                    </li>
                                                    <?php }else{

                                                    } ?>
                                                @endforeach
                                            </ol>
                                            <hr>
                                            <h4><b><u><i class="fa-solid fa-file"></i> Link </u></b></h4>
                                            <ol>
                                                @foreach ($lessonLink as $lesLink)
                                                    <?php if($lesLink->lessons_id == $ls->id){?>
                                                    <li style="pointer-events: none;">
                                                        <a class="btn btn-primary"
                                                            href="{{ $lesLink->lesson_link_path }}" target="_blank"
                                                            role="button"><i class="fa-solid fa-file"></i>
                                                            <?= $lesLink->lesson_link_name ?></a>
                                                    </li>
                                                    <?php }else{

                                                    } ?>
                                                @endforeach
                                            </ol>
                                            <!-- Modal -->
                                            <div class="modal fade" id="videoModal<?= $i ?>" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark border-dark">
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body bg-dark p-0">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script language='JavaScript' type='text/javascript'>
                                                $(document).ready(function() {
                                                    // Set iframe attributes when the show instance method is called
                                                    $("#videoModal<?= $i ?>").on("show.bs.modal", function(event) {
                                                        let button = $(event.relatedTarget); // Button that triggered the modal
                                                        let url = button.data("video"); // Extract url from data-video attribute
                                                        $(this).find("iframe").attr({
                                                            src: url,
                                                            allow: "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        });
                                                    });

                                                    // Remove iframe attributes when the modal has finished being hidden from the user
                                                    $("#videoModal<?= $i ?>").on("hidden.bs.modal", function() {
                                                        $("#videoModal<?= $i ?> iframe").removeAttr("src allow");
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        @endforeach

                        {{-- Posttest_Example --}}
                        <div class="accordion" id="accordionExample">
                            <div class="card" style="background-color: #949494">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-dark" type="button"
                                            data-toggle="collapse" data-target="#posttest" aria-expanded="true"
                                            aria-controls="posttest">
                                            <i class="fas fa-arrow-right" style="color:#F77100"></i>
                                            <b>แบบทดสอบหลังเรียน</b>
                                            (เนื้อหาถูกล็อคเนื่องจากยังไม่ได้ลงทะเบียนคอร์ส)
                                        </button>
                                    </h2>
                                </div>

                                <?php if($posttest == null){?>
                                <div id="posttest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <h4>
                                            <center><u>ไม่มีแบบทดสอบก่อนเรียนในตอนนี้</u></center>
                                        </h4>
                                        </button>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div id="posttest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ol>
                                            <li>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#posttest_q" style="pointer-events: none;">
                                                    <i class="fas fa-question"></i> คลิกเพื่อทำแบบทดสอบหลังเรียน
                                                </button>
                                            </li>
                                        </ol>

                                        <!-- Modal -->
                                        <div class="modal fade" id="posttest_q" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <?= Form::open(['url' => 'courses-page/sendPosttest', 'files' => false]) ?>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">แบบทดสอบหลังเรียน
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-8">
                                                                <?php $i = 0; ?>
                                                                @foreach ($posttest as $postt)
                                                                    <?php $i++; ?>
                                                                    <div class="form-group">
                                                                        <label>
                                                                            <h4>{{ $i . '.  ' . $postt->posttest_question }}
                                                                            </h4>
                                                                        </label>
                                                                        @foreach ($posttest_ans as $post_ans)
                                                                            <?php if($post_ans->question_id == $postt->id){ ?>
                                                                            <div class="control-group">
                                                                                <label class="control control-radio">
                                                                                    {{ $post_ans->posttest_answer }}
                                                                                    <input type="radio"
                                                                                        name="ans_posttest{{ $i }}"
                                                                                        value="{{ $post_ans->id }}">
                                                                                    <input type="hidden"
                                                                                        name="quest_posttest{{ $i }}"
                                                                                        value="{{ $postt->id }}">
                                                                                    <div class="control_indicator"></div>
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        @endforeach
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                                <input type="hidden" name="loop" id="loop"
                                                                    value="{{ $i }}">
                                                                <input type="hidden" name="courses_id" id="courses_id"
                                                                    value="{{ $courses_page->id }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-2"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">ส่งคำตอบ</button>

                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        {{-- Posttest_Example --}}

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <?php }else{ ?>
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="card" style="border: none;">
                    <div class="card-body">
                        <h4 class="card-title">รายละเอียดบทเรียน</h4>
                        <p class="card-text">

                            <?php $i = 0; ?>
                            <?php if ($lessonCount == 0) {
                                echo '<h4><center><u>ไม่มีบทเรียนในตอนนี้</u></center></h4>';
                            } ?>

                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-dark" type="button"
                                            data-toggle="collapse" data-target="#pretest" aria-expanded="true"
                                            aria-controls="pretest">
                                            <i class="fas fa-arrow-right" style="color:#F77100"></i>
                                            <b>แบบทดสอบก่อนเรียน</b>
                                        </button>
                                    </h2>
                                </div>

                                <?php if($pretest == null){?>
                                <div id="pretest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <h4>
                                            <center><u>ไม่มีแบบทดสอบก่อนเรียนในตอนนี้</u></center>
                                        </h4>
                                        </button>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div id="pretest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ol>
                                            <li>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    <i class="fas fa-question"></i> คลิกเพื่อทำแบบทดสอบก่อนเรียน
                                                </button>
                                            </li>
                                        </ol>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <?= Form::open(['url' => 'courses-page/sendPretest', 'files' => false]) ?>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">แบบทดสอบก่อนเรียน
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-8">
                                                                <?php $i = 0; ?>
                                                                @foreach ($pretest as $pt)
                                                                    <?php $i++; ?>
                                                                    <div class="form-group">
                                                                        <label>
                                                                            <h4>{{ $i . '.  ' . $pt->pretest_question }}
                                                                            </h4>
                                                                        </label>
                                                                        @foreach ($pretest_ans as $ans)
                                                                            <?php if($ans->question_id == $pt->id){ ?>
                                                                            <div class="control-group">
                                                                                <label class="control control-radio">
                                                                                    {{ $ans->pretest_answer }}
                                                                                    <input type="radio"
                                                                                        name="ans_pretest{{ $i }}"
                                                                                        value="{{ $ans->id }}">
                                                                                    <input type="hidden"
                                                                                        name="quest_pretest{{ $i }}"
                                                                                        value="{{ $pt->id }}">
                                                                                    <div class="control_indicator"></div>
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        @endforeach
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                                <input type="hidden" name="loop" id="loop"
                                                                    value="{{ $i }}">
                                                                <input type="hidden" name="courses_id" id="courses_id"
                                                                    value="{{ $courses_page->id }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-2"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">ส่งคำตอบ</button>

                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        @foreach ($lesson as $ls)
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left text-dark" type="button"
                                                data-toggle="collapse" data-target="#collapseOne<?= $i ?>"
                                                aria-expanded="true" aria-controls="collapseOne<?= $i ?>">
                                                <i class="fas fa-arrow-right" style="color:#F77100"></i>
                                                <b><?= $ls->lesson_name ?></b>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne<?= $i ?>" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                            <h4><b><u><i class="fa-solid fa-circle-play"></i> Video </u></b></h4>
                                            <ol>
                                                @foreach ($lessonVideo as $lesVideo)
                                                    <?php if($lesVideo->lessons_id == $ls->id){?>

                                                    <li>
                                                        <p><button type="button" class="btn"
                                                                style="background-color:#F77100;color:white"
                                                                data-toggle="modal" data-target="#videoModal<?= $i ?>"
                                                                data-video="<?= $lesVideo->lesson_video_path ?>"><i
                                                                    class="fab fa-youtube text-white"></i>
                                                                <?= $lesVideo->lesson_video_name ?></button></p>
                                                    </li>

                                                    <?php }else{

                                                    } ?>
                                                @endforeach
                                            </ol>
                                            <hr>
                                            <h4><b><u><i class="fa-solid fa-file"></i> File </u></b></h4>
                                            <ol>
                                                @foreach ($lessonFile as $lesFile)
                                                    <?php if($lesFile->lessons_id == $ls->id){?>
                                                    <li>
                                                        <a class="btn btn-primary"
                                                            href="{{ url('/storage/' . $courses_page->course_name . '/' . $lesFile->lesson_files_path) }}"
                                                            target="_blank" role="button"><i class="fa-solid fa-file"></i>
                                                            <?= $lesFile->lesson_files_name ?></a>
                                                    </li>
                                                    <?php }else{

                                                        } ?>
                                                @endforeach
                                            </ol>
                                            <hr>
                                            <h4><b><u><i class="fa-solid fa-file"></i> Link </u></b></h4>
                                            <ol>
                                                @foreach ($lessonLink as $lesLink)
                                                    <?php if($lesLink->lessons_id == $ls->id){?>
                                                    <li>
                                                        <a class="btn btn-primary"
                                                            href="{{ $lesLink->lesson_link_path }}" target="_blank"
                                                            role="button"><i class="fa-solid fa-file"></i>
                                                            <?= $lesLink->lesson_link_name ?></a>
                                                    </li>
                                                    <?php }else{
                                                        
                                                    } ?>
                                                @endforeach
                                            </ol>
                                            <!-- Modal -->
                                            <div class="modal fade" id="videoModal<?= $i ?>" tabindex="-1"
                                                role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark border-dark">
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body bg-dark p-0">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item"
                                                                    allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script language='JavaScript' type='text/javascript'>
                                                $(document).ready(function() {
                                                    // Set iframe attributes when the show instance method is called
                                                    $("#videoModal<?= $i ?>").on("show.bs.modal", function(event) {
                                                        let button = $(event.relatedTarget); // Button that triggered the modal
                                                        let url = button.data("video"); // Extract url from data-video attribute
                                                        $(this).find("iframe").attr({
                                                            src: url,
                                                            allow: "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        });
                                                    });

                                                    // Remove iframe attributes when the modal has finished being hidden from the user
                                                    $("#videoModal<?= $i ?>").on("hidden.bs.modal", function() {
                                                        $("#videoModal<?= $i ?> iframe").removeAttr("src allow");
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        @endforeach


                        {{-- Posttest_Example --}}
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-dark" type="button"
                                            data-toggle="collapse" data-target="#posttest" aria-expanded="true"
                                            aria-controls="posttest">
                                            <i class="fas fa-arrow-right" style="color:#F77100"></i>
                                            <b>แบบทดสอบหลังเรียน</b>
                                        </button>
                                    </h2>
                                </div>

                                <?php if($posttest == null){?>
                                <div id="posttest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <h4>
                                            <center><u>ไม่มีแบบทดสอบหลังเรียนในตอนนี้</u></center>
                                        </h4>
                                        </button>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div id="posttest" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ol>
                                            <li>
                                                <?php if($certificate == null){ ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#posttest_q">
                                                    <i class="fas fa-question"></i> คลิกเพื่อทำแบบทดสอบหลังเรียน
                                                </button>
                                            </li>
                                        </ol>

                                        <!-- Modal -->
                                        <div class="modal fade" id="posttest_q" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <?= Form::open(['url' => 'courses-page/sendPosttest', 'files' => false]) ?>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">แบบทดสอบหลังเรียน
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-2"></div>
                                                            <div class="col-8">
                                                                <?php $i = 0; ?>
                                                                @foreach ($posttest as $postt)
                                                                    <?php $i++; ?>
                                                                    <div class="form-group">
                                                                        <label>
                                                                            <h4>{{ $i . '.  ' . $postt->posttest_question }}
                                                                            </h4>
                                                                        </label>
                                                                        @foreach ($posttest_ans as $post_ans)
                                                                            <?php if($post_ans->question_id == $postt->id){ ?>
                                                                            <div class="control-group">
                                                                                <label class="control control-radio">
                                                                                    {{ $post_ans->posttest_answer }}
                                                                                    <input type="radio"
                                                                                        name="ans_posttest{{ $i }}"
                                                                                        value="{{ $post_ans->id }}">
                                                                                    <input type="hidden"
                                                                                        name="quest_posttest{{ $i }}"
                                                                                        value="{{ $postt->id }}">
                                                                                    <div class="control_indicator"></div>
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        @endforeach
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                                <input type="hidden" name="loop" id="loop"
                                                                    value="{{ $i }}">
                                                                <input type="hidden" name="courses_id" id="courses_id"
                                                                    value="{{ $courses_page->id }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-2"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-primary">ส่งคำตอบ</button>

                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                        <?php }else{ ?>
                                        <a href="{{ route('register_courses') }}" class="btn btn-primary">
                                            <i class="fas fa-question"></i> ได้รับเกียรติบัตรแล้ว
                                        </a>
                                        <?php } ?>

                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        {{-- Posttest_Example --}}


                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <?php } ?>

    </div>
@endsection
@section('footer')
    @if (session()->has('sendpretest'))
        <script>
            swal("<?php echo session()->get('sendpretest'); ?>", "", "success");
        </script>
    @endif
    @if (session()->has('register'))
        <script>
            swal("<?php echo session()->get('register'); ?>", "", "success");
        </script>
    @endif
@endsection
