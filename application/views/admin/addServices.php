<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <?php 
    if(!empty($selectedService)){
        $ss = $selectedService[0];
        $packages = json_decode($ss['service_packages'],true);
        $keyHL = json_decode($ss['keyhighlight_points'],true);
        $features = json_decode($ss['label_points'],true);
    }
    
    ?>
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="adService">
                    <form method="post" id="servicesForm">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title text-white">Add Services</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body row">
                                <div class="form-group row col-sm-6">
                                    <label class="col-sm-4 text-center">Select Category</label>
                                    <select class="form-control col-sm-8" name='category'>
                                        <option value="">Select Cateory</option>
                                        <?php if (count($categories) > 0) {
                                            for ($i = 0; $i < count($categories); $i++) { ?>
                                                <option  value="<?php echo $categories[$i]['id'] ?>"
                                                <?php if(isset($ss['category_id']) && $ss['category_id'] == $categories[$i]['id']){echo 'selected';}?>
                                                >
                                                <?php echo $categories[$i]['category'] ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="col-sm-4 text-center">Service Name</label>
                                    <input type="text" class="form-control col-sm-8" name='sName' required
                                   value = '<?php if(isset($ss['service_name'])){echo $ss['service_name'];}?>'
                                    >
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="col-sm-4 text-center">Service Price</label>
                                    <input type="number" class="form-control col-sm-8" name='servicePrice' required
                                    value = '<?php if(isset($ss['service_price'])){echo $ss['service_price'];}?>'
                                    >
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="col-sm-4 text-center">Short Description</label>
                                    <textarea class="form-control col-sm-8" name='sdescription' required>
                                    <?php if(isset($ss['service_short_description'])){echo $ss['service_short_description'];}?>
                                    </textarea>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="col-sm-4 text-center">Long Description</label>
                                    <textarea class="form-control col-sm-8" name='ldescription' required><?php if(isset($ss['service_description'])){echo $ss['service_description'];}?></textarea>
                                </div>
                                <?php for ($i = 0; $i < 6; $i++) { ?>
                                    <div class="form-group row col-sm-6">
                                        <label class="col-sm-4 text-center">Key Highlight <?php echo $i + 1 ?></label>
                                        <input type="text" class="form-control col-sm-8" required name='keyHighlight<?php echo $i + 1 ?>'
                                        value = '<?php if(isset($keyHL) && count($keyHL)>0){echo $keyHL[$i];}?>'
                                        >
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title text-white">Service Features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body row">
                                <?php for ($i = 0; $i < 6; $i++) { ?>
                                    <div class="form-group row col-sm-6">
                                        <label class="col-sm-4 text-center">Feature Heading <?php echo $i + 1 ?></label>
                                        <input type="text" class="form-control col-sm-8" name='featureHeading<?php echo $i + 1 ?>'
                                        value = '<?php if(isset($features) && count($features)>0){echo $features[$i]['heading'];}?>'
                                        >
                                    </div>
                                    <div class="form-group row col-sm-6">
                                        <label class="col-sm-4 text-center">Feature Description <?php echo $i + 1 ?></label>
                                        <input type="text" class="form-control col-sm-8" required name='featureDescription<?php echo $i + 1 ?>'
                                        value = '<?php if(isset($features) && count($features)>0){echo $features[$i]['description'];}?>'
                                        >
                                    </div>
                                <?php } ?>

                            </div>
                            <!-- /.card-body -->
                        </div>                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>