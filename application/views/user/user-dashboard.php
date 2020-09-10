<!-- Content Wrapper. Contains page content -->
<div class="pcoded-content">
    <div class="row container m-0">
        <?php 
        // echo '<pre>';
        // print_r($services);
        if(count($services)>0){
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

                        
                        <a href="<?php echo base_url('User/upload_document/').base64_encode($services[$i]['service_id']) ?>" class="btn-sm offset-8 badge bg-success">
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
        }
        ?>
    </div>
</div>