@extends('layouts.app')
@section('content')
    <div class="container" style="margin-bottom:20%">

        <div class="row mt-5">
            <div class="col-lg-8">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/2faNNIn7k8E"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
                <h1>
                    ชื่อคอร์ส : Lorem ipsum dolor sit amet consectetur #TECHNOLOGY
                </h1>
            </div>

            <div class="col-lg-4">
                <div class="card w-75 ml-5">
                    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg"
                        alt="pictopic">
                    <div class="card-body">
                        <h4 class="card-title">ชื่อคอร์ส</h4>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dignissimos libero non,
                            distinctio
                            voluptates neque eos corporis quis error, magnam autem necessitatibus consequatur ullam.
                            Dignissimos
                            eveniet optio tempore quo voluptatem.
                        </p>
                        <p class="card-text">
                            จำนวนบทเรียน 10 บทเรียน | <i class="far fa-clock"></i> 4 ชั่วโมง 50 นาที
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
                                <td><i class="fas fa-book fa-2x" style="color:#F77100"></i> 10 บทเรียน </td>
                                <td><i class="far fa-clock fa-2x ml-5" style="color:#F77100"></i> 4 ชั่วโมง 50 นาที</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-paperclip fa-2x" style="color:#F77100"></i> 1 ไฟล์ประกอบการเรียน</td>
                                <td><i class="fas fa-level-up-alt fa-2x ml-5" style="color:#F77100"></i> ระดับความยาก : ง่าย
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
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur
                                    temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum
                                    asperiores
                                    non id illum velit quaerat quod magnam accusantium.</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-check fa-2x" style="color:#F77100"></i></td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur
                                    temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum
                                    asperiores
                                    non id illum velit quaerat quod magnam accusantium.</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-check fa-2x" style="color:#F77100"></i></td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda dolorem, consectetur
                                    temporibus laborum quae provident, exercitationem possimus amet ab adipisci, eum
                                    asperiores
                                    non id illum velit quaerat quod magnam accusantium.</td>
                            </tr>
                        </table>
                        </p>
                        <p class="card-text mt-2">
                        <h4>วัตถุประสงค์</h4>
                        <table class="table">
                            <tr>
                                <td>-</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quidem voluptatem eius
                                    maxime
                                    quasi quibusdam amet iusto. Incidunt non quidem assumenda optio maxime voluptates
                                    molestias
                                    aperiam ab at, recusandae ea.</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quidem voluptatem eius
                                    maxime
                                    quasi quibusdam amet iusto. Incidunt non quidem assumenda optio maxime voluptates
                                    molestias
                                    aperiam ab at, recusandae ea.</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quidem voluptatem eius
                                    maxime
                                    quasi quibusdam amet iusto. Incidunt non quidem assumenda optio maxime voluptates
                                    molestias
                                    aperiam ab at, recusandae ea.</td>
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

                    <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                         <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <i class="fas fa-arrow-right" style="color:#F77100"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                          </button>
                         </h2>
                       </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                          <ol>
                            <li><p><button type="button" class="btn" style="background-color:#F77100" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/stxDS0gRGmo"><i class="fab fa-youtube text-white"></i> Lorem ipsum dolor sit amet consectetur adipisicing elit. </button></p></li>
                          </ol>
                          </div>
                        </div>
                      </div>
                    </div>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4"></div>
          </div>

        <!-- Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark border-dark">
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body bg-dark p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('footer')
<script>
    $(document).ready(function() {
        // Set iframe attributes when the show instance method is called
        $("#videoModal").on("show.bs.modal", function(event) {
            let button = $(event.relatedTarget); // Button that triggered the modal
            let url = button.data("video");      // Extract url from data-video attribute
            $(this).find("iframe").attr({
                src : url,
                allow : "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            });
        });

        // Remove iframe attributes when the modal has finished being hidden from the user
        $("#videoModal").on("hidden.bs.modal", function() {
            $("#videoModal iframe").removeAttr("src allow");
        });
    });
    </script>
@endsection
