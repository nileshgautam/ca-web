<div class="content-wrapper">
    <section class="content pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="<?php echo base_url('Admin/saveSection') ?>" enctype='multipart/form-data'>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Add Services</h3>
                            </div>
                            <div class="card-body row">
                                <!-- services -->
                                <div class="form-group row col-sm-5">
                                    <label class="col-sm-4 text-center">Select Service</label>
                                    <select class="form-control col-sm-8" name='service'>
                                        <option value="">Select Service</option>
                                        <?php if (count($services) > 0) {
                                            for ($i = 0; $i < count($services); $i++) { ?>
                                                <option value="<?php echo $services[$i]['serviceId'] ?>">
                                                    <?php echo $services[$i]['service_name'] ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <!-- image -->
                                <div class="form-group col-sm-3 pl-2">
                                    <label for="exampleFormControlFile1">Upload Side Image</label>
                                    <input type="file" name="sideImage" class="form-control-file" id="exampleFormControlFile1">
                                </div>

                                <!-- image side -->
                                <div class="form-group col-sm-4">
                                    <label for="side">Image Side</label>
                                    <select class="form-control col-sm-8" name='imgSide' id="side">
                                        <option value="left">Left</option>
                                        <option value="right">Right</option>
                                    </select>
                                </div>
                                <!-- Description -->
                                <section class="content col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Add description
                                                    </h3>
                                                    <!-- tools box -->
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                            <i class="fas fa-minus"></i></button>
                                                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                            <i class="fas fa-times"></i></button>
                                                    </div>
                                                    <!-- /. tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body pad">
                                                    <div class="mb-3">
                                                        <textarea class="textarea" name="desc" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-->
                                    </div>
                                    <!-- ./row -->
                                </section>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function() {
        // Summernote
        $('.textarea').summernote()
    })
</script>