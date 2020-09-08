<!-- Content Wrapper. Contains page content -->
<div class="pcoded-content">
    <div class="row container m-0">
        <?php for ($i = 0; $i < 1; $i++) { ?>
            <div class="col-md-5 py-2">
                <!-- Widget: user widget style 2 -->
                <div class="card border-gray card-style">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header header-style">
                        <!-- /.widget-user-image -->
                        <h6 class="p-2 text-dark">Proprietorship Company Registration</h6>
                    </div>
                    <div class="card-body card-body-style">
                        <div class="nav-item">
                            <span> Status</span><span class="float-right">Payment Received</span>
                        </div>
                        <div class="nav-item">
                            <span>Premium </span> <span class="float-right">7000.00</span>

                        </div>
                        <div class="nav-item">
                            <span>Purchage Date</span> <span class="float-right">07/Sep/2020</span>
                        </div>
                        <div class="py-2">

                        
                        <a href="<?php echo base_url('upload-document') ?>" class="btn-sm offset-8 badge bg-success">
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
        ?>
    </div>
</div>