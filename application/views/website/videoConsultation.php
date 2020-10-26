<div class="row business-info m-0">
    <div class="col-sm-6" style="position:unset">
        <div class="head-para">
            <h4>Video Consultation</h4>
            <div class="get-free">
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </div>
        </div>
    </div>
    <div class="col-sm-6" style="position:unset">
        <div><img src="<?php echo base_url('assets/image/index/videoConsultant.jpg') ?>" alt="" height="" width="100%"></div>
    </div>
</div>

<section class="">
    <div class="container city" style="margin-top:-20px">
        <div class="row ">
            <div class="col-sm-6 pl-5">
                <h5 class="title-select text-right">Pick up, your service for Consultation</h5>
                <!-- <p class="text-danger title-3 ">Trusted by over 10,000 business owners worldwide</p> -->

            </div>
            <div class="col-sm-6 mt-auto mb-auto">
                <div class="recent-city float-left">
                    <div class="form-group mb-0">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <?php if (isset($services) && count($services) > 0) {
                                for ($i = 0; $i < count($services); $i++) { ?>
                                    <option><?php echo $services[$i]['service_name'] ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="mt-3">
    <div class="container">
        <div class="row" id="videoContain">
            <?php            
            $name=['Basic','Essential','Premium'];
            for ($j = 0; $j < 3; $j++) { ?>
                <div class="card col-sm-4 p-0">
                    <div class="videoContainer">
                        <video id="video1" class="col-sm-12 p-0" title="Watch Sample Consultation Video">
                            <source src="<?php echo base_url('assets/video/sample.mp4')?>" type="video/mp4">
                            <source src="<?php echo base_url('assets/video/sample.mp4')?>" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>
                        <button class="btn play-pause"><i class="fa fa-play-circle-o" aria-hidden="true"></i></button>
                    </div>

                    <div class="card-body p-3">
                        <h5 class="card-title mb-1"><?php echo $name[$j] ?> <span class="float-right" style="font-size:15px !important">Price ₹1500</span></h5>
                        <p class="mb-1 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p class="mb-2">
                            In this session we will cover -
                        </p>
                        <div class="session-detail">
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <div class="session-description row">
                                    <i class="fa fa-check col-sm-1 text-success" aria-hidden="true"></i>
                                    <p class="col-sm-11 mb-0">Lorem ipsum dolor sit amet,</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div>
                    <button class="btn btn-themeColor col-sm-4">Book Now</button>
                    </div>                    
                </div>
            <?php } ?>
        </div>
    </div>
</section> -->