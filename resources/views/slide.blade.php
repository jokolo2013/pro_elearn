<div class="row">
    <div class="col-12">
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner" style="width: 95%; margin-left: 2.5%" role="listbox">
                    <?php $i = 0; foreach ($courses as $sl): ?>
                    <?php
                    if ($i == 0) {
                        $set_ = 'active';
                    } else {
                        $set_ = '';
                    }
                    ?>
                    <div class="carousel-item <?php echo $set_; ?>">
                        <div class="col-md-4 mb-3 mt-3">
                            <div class="card h-100">
                                <a href="{{ asset('images/course/cover/' . $sl->course_images) }}" data-lity>
                                    <img class="card-img-top"
                                        src="{{ asset('images/course/cover/' . $sl->course_images) }}"
                                        alt="<?= $sl->course_name ?>">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?= $sl->course_name ?> #<?= $sl->courses_type->courses_type_name ?>
                                    </h4>
                                    <hr>
                                    <p class="card-text"><?= $sl->course_detail ?></p>
                                    <i class="far fa-clock"></i> <?= $sl->course_times ?> ชั่วโมง
                                </div>
                                <div class="card-footer">
                                    <a class="btn text-white w-100" style="background-color: #F77100"
                                    href="{{ url("/courses-page/".$sl->id."/")}}">ดูคอร์ส</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; endforeach ?>
                </div>

                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle"
                        aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle"
                        aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>


</div>
