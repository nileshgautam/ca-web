        </div>
        </div>
        </div>
        </div>
        <!-- Warning Section Ends -->
        <!-- Required Jquery -->
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/popper.js/popper.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/bootstrap/js/bootstrap.min.js"></script>

        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/modernizr/modernizr.js"></script>
        <!-- am chart -->
        <script src="<?php echo base_url('usertheme/') ?>assets/pages/widget/amchart/amcharts.min.js"></script>
        <script src="<?php echo base_url('usertheme/') ?>assets/pages/widget/amchart/serial.min.js"></script>
        <!-- Chart js -->
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/chart.js/Chart.js"></script>
        <!-- Todo js -->
        <script type="text/javascript " src="<?php echo base_url('usertheme/') ?>assets/pages/todo/todo.js "></script>
        <!-- Custom js -->
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/pages/dashboard/custom-dashboard.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/script.js"></script>
        <script type="text/javascript " src="<?php echo base_url('usertheme/') ?>assets/js/SmoothScroll.js"></script>
        <script src="<?php echo base_url('usertheme/') ?>assets/js/pcoded.min.js"></script>
        <script src="<?php echo base_url('usertheme/') ?>assets/js/vartical-demo.js"></script>
        <script src="<?php echo base_url('usertheme/') ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>adminAssets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>adminAssets/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>adminAssets/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>adminAssets/js/responsive.bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('usertheme/') ?>assets/js/custom.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.21.0/trumbowyg.min.js"></script>

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
        </body>

        </html>