<!-- Content Wrapper. Contains page content -->
<div class="pcoded-content">
    <div class="row container m-0">
        <?php
        // echo '<pre>';
        // print_r($services);
        if (count($services) > 0) {
            for ($i = 0; $i < count($services); $i++) {
        ?>
                <div class="col-md-6 py-2">
                    <!-- Widget: user widget style 2 -->
                    <div class="card border-gray card-style">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header header-style">
                            <!-- /.widget-user-image -->
                            <h6 class="p-2 text-dark"><?php echo $services[$i]['service_name'] ?></h6>
                        </div>
                        <div class="card-body card-body-style">
                            <div class="nav-item">
                                <span> Status</span><span class="float-right"><?php echo $services[$i]['status'] ?></span>
                            </div>
                            <div class="nav-item">
                                <span>Package </span> <span class="float-right"><?php echo $services[$i]['package'] ?></span>
                            </div>
                            <div class="nav-item">
                                <span>Price </span> <span class="float-right"><?php echo $services[$i]['price'] ?></span>
                            </div>
                            <div class="nav-item">
                                <span>Purchase Date</span> <span class="float-right"><?php echo $services[$i]['timeStamp'] ?></span>
                            </div>
                            <div class="py-2">


                                <a href="<?php echo base_url('User/upload_document/') . base64_encode($services[$i]['service_id']) ?>" class="btn-sm offset-8 badge bg-success">
                                    <i class="ti-upload"></i> Upload document
                                </a>
                            </div>
                        </div>
                        <div class="card-footer p-0">
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
        <?php  }
        }else{
        ?>
        <div Class="col-sm-12 mt-5"><h4 class="text-center text-gray">No Service found</h4></div>
<?php } ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('User/updatePassword')?>" method="post" class="p-3 pass-form">                            
                            <div class="form-group"><label for="new-password">New Password</label>
                                <input type="password" name="new-password" id="new-password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" name="confirm-password" id="confirm-password" class="form-control">
                            </div>
                            <div class="form-group ">                                
                                <input type="submit" value="Change" class="form-control btn-sm btn-primary col-sm-3 float-right">
                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        let fLogin = '<?php echo $fLogin ?>';
        if (fLogin == 0) {
            $('#exampleModal').modal('show');
        }
    })
</script>