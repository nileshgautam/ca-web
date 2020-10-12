<style>
    #header {
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 0%, rgba(0, 212, 255, 1) 49%) !important;
    }
</style>

<div class="business-services-info pos-unset">
    <div class="container pos-unset">
        <div class="row pos-unset">
            <div class="col-sm-7 pos-unset">
                <div class="text-white pos-unset">
                    <h2><?php echo $service[0]['service_name'] ?></h2>
                    <!-- <h4>Registration</h1> -->
                    <p>
                        <?php echo $service[0]['service_short_description'] ?>
                    </p>

                    <div class="row">
                        <?php if (isset($service[0]['keyhighlight_points'])) {
                            $keyHL = json_decode($service[0]['keyhighlight_points'], true);
                            for ($i = 0; $i < count($keyHL); $i++) {
                                if (isset($keyHL[$i]) && !empty($keyHL[$i])) {
                        ?>
                                    <div class="col-sm-4 row pos-unset">
                                        <div class="col-sm-1 pos-unset"> <span>
                                                <img src="<?php echo base_url('assets/image/icon/correct.png') ?>" alt="" height="16"></span></div>
                                        <div class="col-sm-10 pos-unset"><?php echo $keyHL[$i] ?></div>
                                    </div>
                        <?php }
                            }
                        } ?>
                    </div>

                </div>

                <!-- <div class="container"> -->


                <div class="row" id='packages'>
                    <?php
                    $packages = json_decode($service[0]['packages'], true);
                    if ($packages[0]['price'] > 0) {
                        for ($i = 0; $i < count($packages); $i++) {
                    ?>
                            <div class="col-sm-4">
                                <div class="package">
                                    <div class="row">
                                        <div class="col-sm-1 prt-5"><input type="radio" package="<?php echo $packages[$i]['name'] ?>" <?php echo $i == 0 ? 'checked' : '' ?> value='<?php echo $packages[$i]['price'] ?>' name="package"></div>
                                        <div class="col-sm-5"><strong class="f-14"><?php echo $packages[$i]['name'] ?></strong></div>
                                        <div class="col-sm-5"><strong class="f-14 "> ₹ <?php echo $packages[$i]['price'] ?></strong></div>
                                    </div>
                                    <div class="row mt-25">
                                        <?php
                                        if (count($packages[$i]['servicesNames']) > 0) {
                                            $pServices = $packages[$i]['servicesNames'];
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
                    <img class="card-img-top" src="<?php echo base_url('assets/image/services/p1.PNG') ?>" alt="Card image cap" width="500">
                    <div class="card-body">
                        <strong>Get Started Now</strong>

                        <form action="<?php echo base_url('ControlUnit/payment') ?>" method='post' class="row m-0 clientForm">
                            <input type="text" name="uName" placeholder="Full Name" class="form-control col-sm-6" required>
                            <input type="email" name="email" placeholder="Email Address" class="form-control col-sm-6" required>
                            <input type="text" name="contact" placeholder="Contact Number" class="form-control col-sm-6" required>
                            <input type="text" name="state" placeholder="State" class="form-control col-sm-6" required>
                            <input hidden value="<?php echo current_url() ?>" name='redirection' required>
                            <input hidden value="<?php echo $service[0]['serviceId'] ?>" id="serviceId" name='serviceId' required>
                            <input hidden value="<?php echo isset($packages[0]['price']) ? $packages[0]['price'] : $service[0]['service_price'] ?>" id="price" name='price' required>
                            <input hidden value="<?php echo isset($packages[0]['price']) ? $packages[0]['name'] : 'single' ?>" id="package" name='package' required>
                            <div class="text-center py-2 col-sm-12">
                                <button type="submit" id="payBtn" class="btn btn-submit">Pay for Essential Plan <span class="ml-20" id='payPrice'> ₹ <?php echo $packages[0]['price'] > 0 ? $packages[0]['price'] : $service[0]['service_price'] ?></span><span><img src="<?php echo base_url('assets/image/icon/speed.png') ?>" alt="" height="16"></span></button>
                            </div>

                            <!-- <button class="btn-rounded"></button> -->
                        </form>
                        <p class="">Please Note: On successful receipt of payment, you will get an email
                            and sms containing your login details. In case you do not receive email/SMS please call on +91
                            9876543210 and our team will assist you.</p>
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
            <div class="content p-4">
                <h4>What is a</h4>
                <h2><?php echo $service[0]['service_name'] ?></h2>
                <p class="text-justify"><?php echo $service[0]['service_description'] ?></p>
            </div>
        </div>
    </div>
</section>

<!-- advantages -->
<?php if (isset($service[0]['advantages']) && !empty($service[0]['advantages'])) { ?>
<section class="container">
    <div class="row mt-4" id="advantages">
        <div class="col-sm-6">
            <div class="content p-4">
                <h2>Advantages</h2>
                <p class="text-justify"><?php echo $service[0]['advantages'] ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <div><img src="<?php echo base_url('assets/image/index/advantages.jpg') ?>" alt=""></div>
        </div>
    </div>
</section>
<?php } ?>

<!-- disadvantages -->
<?php if (isset($service[0]['disadvantages']) && !empty($service[0]['disadvantages'])) { ?>
    <section class="container">
        <div class="row mt-4" id="disadvantages">
            <div class="col-sm-6">
                <div><img src="<?php echo base_url('assets/image/index/disadvantages.jpg') ?>" alt=""></div>
            </div>
            <div class="col-sm-6">
                <div class="content p-4">
                    <h2>Disadvantages</h2>
                    <p class="text-justify"><?php echo $service[0]['disadvantages'] ?></p>
                </div>
            </div>

        </div>
    </section>
<?php } ?>

<!-- Registration Process -->
<?php if (isset($service[0]['registration_process']) && !empty($service[0]['registration_process'])) { ?>
    <section class="container">
        <div class="row mt-4" id="registration_process">
            <div class="col-sm-6">
                <div><img src="<?php echo base_url('assets/image/index/onlineRegistration.jpg') ?>" alt=""></div>
            </div>
            <div class="col-sm-6">
                <div class="content p-4">
                    <h2>Registration Process</h2>
                    <p class="text-justify"><?php echo $service[0]['registration_process'] ?></p>
                </div>
            </div>

        </div>
    </section>
<?php } ?>

<!-- Post Incorporate -->
<?php if (isset($service[0]['post_incorporation_compliances']) && !empty($service[0]['post_incorporation_compliances'])) { ?>
    <section class="container">
        <div class="row mt-4" id="registration_process">
            <div class="col-sm-6">
                <div class="content p-4">
                    <h2>Post Incorporation Compliances</h2>
                    <p class="text-justify"><?php echo $service[0]['post_incorporation_compliances'] ?></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div><img src="<?php echo base_url('assets/image/index/compliance.jpg') ?>" alt=""></div>
            </div>
        </div>
    </section>
<?php } ?>




<!-- dynamic Sections -->
<?php if (isset($sectionData) && !empty($sectionData)) {
    foreach ($sectionData as $key => $value) {
        $section = html_entity_decode($value['section_html']);
        echo $section;
?>

<?php }
} ?>


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