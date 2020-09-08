<style>
    #header {
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 0%, rgba(0, 212, 255, 1) 49%) !important;
    }
</style>

<div class="business-services-info">
    <div class="container">
        <!-- <div class="">
            <div class="col-sm-12">
                <nav class="navbar">
                    <div class="logo">
                        <img src="<?php echo base_url('assets/') ?>image/logo.png" alt="ca.com">
                    </div>
                    <ul>
                        <li><a href="">Business Startups</a> </li>
                        <li><a href="">GST Registration</a> </li>
                        <li><a href="">Income Tax</a></li>
                        <li><a href="">Compliance</a></li>
                    </ul>
                </nav>
            </div>
        </div> -->


        <div class="row">
            <div class="col-sm-7">
                <div class="text-white">
                    <h2><?php echo $service[0]['service_name'] ?></h2>
                    <!-- <h4>Registration</h1> -->
                    <p>
                        <?php echo $service[0]['service_short_description'] ?>
                    </p>

                    <div class="row">
                        <?php if (isset($service[0]['keyhighlight_points'])) {
                            $keyHL = json_decode($service[0]['keyhighlight_points'], true);
                            for ($i = 0; $i < count($keyHL); $i++) { ?>
                                <div class="col-sm-4 row">
                                    <div class="col-sm-1"> <span>
                                            <img src="<?php echo base_url('assets/image/icon/correct.png') ?>" alt="" height="16"></span></div>
                                    <div class="col-sm-10"><?php echo $keyHL[$i] ?></div>
                                </div>
                        <?php }
                        } ?>
                    </div>

                </div>

                <!-- <div class="container"> -->


                <div class="row" id='packages'>
                    <?php
                    $packages = json_decode($service[0]['service_packages'], true);
                    if ($packages[0]['price'] > 0) {
                        for ($i = 0; $i < count($packages); $i++) {
                    ?>
                            <div class="col-sm-4">
                                <div class="package">
                                    <div class="row">
                                        <div class="col-sm-1 prt-5"><input type="radio" package="<?php echo $packages[$i]['name'] ?>" <?php echo $i == 0 ? 'checked' : '' ?> value='<?php echo $packages[$i]['price'] ?>' name="package"></div>
                                        <div class="col-sm-5"><strong class="f-14"><?php echo $packages[$i]['name'] ?></strong></div>
                                        <div class="col-sm-5"><strong class="f-14 "><?php echo $packages[$i]['price'] ?></strong></div>
                                    </div>
                                    <div class="row mt-25">
                                        <?php
                                        if (count($packages[$i]['services']) > 0) {
                                            $pServices = $packages[$i]['services'];
                                            for ($j = 0; $j < count($pServices); $j++) {
                                        ?>
                                                <span class="col-sm-1">
                                                    <img src="<?php echo base_url('assets/image/icon/tickcircle.png') ?>" alt="" height="16"></span>
                                                <span class="col-sm-10"><?php echo $pServices[$j] ?></span>
                                        <?php }
                                        } ?>

                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>

                </div>
            </div>
            <div class="col-sm-5 form-section">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url('assets/image/services/p1.png') ?>" alt="Card image cap" width="500">
                    <div class="card-body">
                        <strong>Get Started Now</strong>

                        <form action="<?php echo base_url('ControlUnit/payment') ?>" method='post'>
                            <input type="text" name="uName" placeholder="Full Name" class="form-contron-1" required>
                            <input type="email" name="email" placeholder="Email Address" class="form-contron-1" required>
                            <input type="text" name="contact" placeholder="Contact Number" class="form-contron-1" required>
                            <input type="text" name="state" placeholder="State" class="form-contron-1" required>
                            <input hidden value="<?php echo current_url() ?>" name='redirection' required>
                            <input hidden value="<?php echo $service[0]['id'] ?>" id="serviceId" name='serviceId' required>
                            <input hidden value="<?php echo $packages[0]['price'] != '0' ? $packages[0]['name'] : 'single' ?>" id="package" name='package' required>
                            <div class="text-center py-2">
                                <button type="submit" id="payBtn" class="btn btn-submit">Pay for Essential Plan <span class="ml-20" id='payPrice'> ₹ <?php echo $packages[0]['price'] > 0 ? $packages[0]['price'] : $service[0]['service_price'] ?></span><span><img src="<?php echo base_url('assets/image/icon/speed.png') ?>" alt="" height="16"></span></button>
                            </div>

                            <!-- <button class="btn-rounded"></button> -->
                        </form>
                        <p class="">Please Note : Once the payment is received you will get an email
                            from us within next 10 minutes. Incase you don’t receive a reply
                            please call us on +91-9876543210</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Section Features of services -->

<section class="container">
    <div class="row mt-210">
        <div class="col-sm-6">
            <div><img src="<?php echo base_url('assets/image/index/Capture.png') ?>" alt=""></div>
        </div>
        <div class="col-sm-6">
            <div class="content py-5">
                <h4>What is a</h4>
                <h2><?php echo $service[0]['service_name'] ?></h2>
                <p><?php echo $service[0]['service_description'] ?></p>
            </div>
        </div>
    </div>
</section>




<!-- Proprietorship Company -->
<section id="services-feature" class="container">
    <div class="row">
        <div class="col-sm-12 py-5">
            <h2 class="section-heading-primary"><?php echo $service[0]['service_name'] ?></h2>
        </div>
    </div>
    <div class="row" id="">
        <?php if (isset($service[0]['label_points'])) {
            $label = json_decode($service[0]['label_points'], true);
            $img = ['f4.png', 'f2.png', 'f3.png', 'f5.png', 'f6.png', 'f1.png'];
            for ($i = 0; $i < count($label); $i++) {
        ?>
                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo base_url('assets/image/icon/') . $img[$i] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $label[$i]['heading'] ?></h5>
                            <p class="card-text"><?php echo $label[$i]['description'] ?></p>

                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>


</section>
<!-- Proprietorship Company end-->

<!-- Message pop up -->
<?php if (!empty($this->session->flashdata('error'))) { ?>
    <script>
        let error = '<?php echo $this->session->flashdata('error'); ?>';
        Notiflix.Notify.Failure(error)
    </script>
<?php } ?>
<?php if (!empty($this->session->flashdata('success'))) { ?>
    <script>
        let error = '<?php echo $this->session->flashdata('success'); ?>';
        Notiflix.Notify.Success(error)
    </script>
<?php } ?>