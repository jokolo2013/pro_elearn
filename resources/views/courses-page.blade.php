@extends('layouts.app')
@section('content')
    <div class="container" style="margin-bottom:20%">
        {{-- <h4><a href="{{url('/')}}" class="stretched-link text-orange">Home </a>/ <?=$courses_page->course_name?></h4> --}}
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
                            <i class="fas fa-book"></i> บทเรียนจำนวน  <?= $lessonCount ?> บทเรียน <br> <i class="far fa-clock"></i> <?= $courses_page->course_times ?>
                            ชั่วโมง
                        </p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn text-white w-100"
                            style="background-color:#F77100">ลงทะเบียน</button>
                    </div>
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
                                                                    style="background-color:#F77100;color:white" data-toggle="modal"
                                                                    data-target="#videoModal<?= $i ?>"
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
                                                            <a class="btn btn-primary" href="{{ asset("files/course/$lesFile->lesson_files_path") }}" target="_blank" role="button"><i class="fa-solid fa-file"></i> <?=$lesFile->lesson_files_name?></a>
                                                        </li>
                                                        <?php }else{

                                                    } ?>
                                                    @endforeach
                                                </ol>
                                                <!-- Modal -->
                                                <div class="modal fade" id="videoModal<?= $i ?>" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg"
                                                        role="document">
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

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>

    </div>
@endsection
@section('footer')
@endsection
