<div class="card-group">
    @foreach ($courses as $course)
        <div class="col-sm-4 py-2 mt-3 mb-3">
            <div class="card h-100">
                <a href="{{ asset('images/course/cover/' . $course->course_images) }}" data-lity>
                    <img class="card-img-top" src="{{ asset('images/course/cover/' . $course->course_images) }}"
                        alt="<?= $course->course_name ?>">
                </a>
                <div class="card-body">
                    <h4 class="card-title"><?= $course->course_name ?></h4>
                    <p class="card-text"><?= $course->course_detail ?></p>
                </div>
                <div class="card-footer">
                    <a class="btn text-white w-100" style="background-color: #F77100"
                    href="{{ url('/courses-page') }}">ดูคอร์ส</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $courses->links() }}

