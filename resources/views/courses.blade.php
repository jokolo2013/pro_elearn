<div class="card-group">
    @foreach ($courses as $course)
        <div class="col-sm-4 py-2 mt-3 mb-3">
            <div class="card h-100">
                <a href="{{ asset('images/course/cover/' . $course->course_images) }}" data-lity>
                    <img class="card-img-top" src="{{ asset('images/course/cover/' . $course->course_images) }}"
                        alt="<?= $course->course_name ?>">
                </a>
                <div class="card-body">
                    <h4 class="card-title">
                        <?= $course->course_name ?> #<?= $course->courses_type->courses_type_name ?>
                    </h4>
                    <hr>
                    <p class="card-text"><?= $course->course_detail ?></p>
                    <i class="fas fa-book"></i>
                    <?php $i=0 ?>
                    บทเรียนจำนวน @foreach ($lesson as $less)
                        <?php
                        if ($less->id_course == $course->id) {
                        $i++;
                        } ?>
                    @endforeach
                        <?php echo $i?>
                    บทเรียน
                    <i class="far fa-clock"></i> <?= $course->course_times ?> ชั่วโมง
                </div>
                <div class="card-footer">
                    <a class="btn text-white w-100" style="background-color: #F77100"
                        href="{{ url('/courses-page/' . $course->id . '/') }}">ดูคอร์ส</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $courses->links() }}
