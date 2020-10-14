<div class="business-info m-0 contact-banner">
    <div class="col-sm-12" style="position:unset">
        <div class="head-para text-center">
            <h1>Contact Us</h1>
        </div>
    </div>


</div>

<div class="container contact-container ">
    <div class="col-sm-12 p-0 m-0 row" style="position:unset">
        <!-- left side -->
        <div class="col-sm-8 c-left">
            <p class="pt-3 mb-1 fs-25 mb-3 text-light"><b>Get in touch with us</b></p>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="text-light">Bangalore Office</span>
                        </div>
                    </div>

                    <div>
                        <div class="text-light f-13 mt-2">
                            <i class="fa fa-map-marker" aria-hidden="true"></i><span class="ml-2"><?php echo BA ?></span>
                        </div>
                        <div class="text-light f-13 mt-1">
                            <a href="tel:080-8758652" class="text-light"><i class="fa fa-phone" aria-hidden="true"></i><span class="ml-2"><?php echo BP ?></span></a>
                        </div>
                        <div class="text-light f-13 mt-1 mb-2">
                        <a href="mailto:contactus@email.com" class="text-light"><i class="fa fa-envelope" aria-hidden="true"></i><span class="ml-2"><?php echo BE ?></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="text-light">Delhi Office</span>
                        </div>
                    </div>

                    <div>
                        <div class="text-light f-13 mt-2">
                            <i class="fa fa-map-marker" aria-hidden="true"></i><span class="ml-2"><?php echo DA ?></span>
                        </div>
                        <div class="text-light f-13 mt-1">
                            <a href="tel:080-8758652" class="text-light"><i class="fa fa-phone" aria-hidden="true"></i><span class="ml-2"><?php echo DP ?></span></a>
                        </div>
                        <div class="text-light f-13 mt-1 mb-2">
                        <a href="mailto:contactus@email.com" class="text-light"><i class="fa fa-envelope" aria-hidden="true"></i><span class="ml-2"><?php echo DE ?></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="text-light">Singapore Office</span>
                        </div>
                    </div>

                    <div>
                        <div class="text-light f-13 mt-2">
                            <i class="fa fa-map-marker" aria-hidden="true"></i><span class="ml-2"><?php echo SA ?></span>
                        </div>
                        <div class="text-light f-13 mt-1">
                        <a href="tel:080-8758652" class="text-light"><i class="fa fa-phone" aria-hidden="true"></i><span class="ml-2"><?php echo SP ?></span></a>
                        </div>
                        <div class="text-light f-13 mt-1 mb-2">
                        <a href="mailto:contactus@email.com" class="text-light"><i class="fa fa-envelope" aria-hidden="true"></i><span class="ml-2"><?php echo SE ?></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="text-light">UAE Office</span>
                        </div>
                    </div>

                    <div>
                        <div class="text-light f-13 mt-2">
                            <i class="fa fa-map-marker" aria-hidden="true"></i><span class="ml-2"><?php echo UA ?></span>
                        </div>
                        <div class="text-light f-13 mt-1">
                        <a href="tel:080-8758652" class="text-light"><i class="fa fa-phone" aria-hidden="true"></i><span class="ml-2"><?php echo UP ?></span></a>
                        </div>
                        <div class="text-light f-13 mt-1 mb-2">
                        <a href="mailto:contactus@email.com" class="text-light"><i class="fa fa-envelope" aria-hidden="true"></i><span class="ml-2"><?php echo UE ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right -->
        <div class="col-sm-4 bg-light">
            <p class="pt-3 mb-1"><b>Drop Us a message and we will connect with you!!</b></p>
            <form action="<?php echo base_url('ControlUnit/saveContactUs') ?>" class="row p-3" method="post">
                <div class="md-form col-sm-12">
                    <input type="text" name="name" class="form-control validate" required placeholder="Your Name">
                </div>
                <div class="md-form col-sm-12">
                    <input type="email" name="email" class="form-control validate" required placeholder="Email">
                </div>
                <div class="md-form col-sm-12">
                    <input type="number" name="phone" class="form-control validate" required placeholder='Phone No.'>
                </div>
                <div class="md-form col-sm-12">
                    <input type="text" name="msg" class="form-control validate" required placeholder='Any Query/Message'>
                </div>
                <div class="md-form col-sm-12">
                    <button type="submit" class="btn btn-primary float-right">Send</button>
                </div>
            </form>
        </div>
    </div>


</div>