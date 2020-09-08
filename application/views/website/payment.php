<?php if (isset($selectedService) && isset($service) && !empty($selectedService) && !empty($service)) {
?>
    <section class="container">
        <div class="row">
            <div class="card col-sm-9 mt-3 card-custom">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $service[0]['service_name'] ?></h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

                    <form method="post" class="row m-0" action="<?php echo base_url('ControlUnit/sendMessage') ?>">
                        <div class="form-group row col-sm-6">
                            <label for="Name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" name="uName" id="Name" value="<?php echo $selectedService['uName'] ?>">
                            </div>
                        </div>
                        <div class="form-group row col-sm-6">
                            <label for="Email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" name="email" id="Email" value="<?php echo $selectedService['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row col-sm-6">
                            <label for="ContactNo" class="col-sm-4 col-form-label">Contact No</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" name="contact" id="ContactNo" value="<?php echo $selectedService['contact'] ?>">
                            </div>
                        </div>
                        <div class="form-group row col-sm-6">
                            <label for="Price" class="col-sm-4 col-form-label">Payable Amount</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" name="price" id="Price" value="<?php echo $selectedService['package'] == 'single' ? $service[0]['service_price'] : '6000' ?>">
                            </div>
                        </div>
                        <input hidden name='state' value=<?php echo $selectedService['state'] ?>)>
                        <input hidden value="<?php echo $selectedService['redirection'] ?>" name='redirection' required>
                        <input hidden value="<?php echo $selectedService['serviceId'] ?>" id="serviceId" name='serviceId' required>
                        <input hidden value="<?php echo $selectedService['package'] ?>" id="package" name='package' required>
                        <div class="col-sm-12"><button type='submit' class="btn btn-primary float-right">Ok</button></div>
                    </form>
                    <!-- <a href="#" class="card-link">Card link</a> -->

                </div>
            </div>
        </div>
    </section>
<?php } ?>