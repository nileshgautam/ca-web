 <!-- Main Footer -->
 <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="<?php echo base_url()?>adminAssets/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>adminAssets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>adminAssets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>adminAssets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>adminAssets/js/responsive.bootstrap4.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>adminAssets/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>adminAssets/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url()?>adminAssets/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url()?>adminAssets/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url()?>adminAssets/js/raphael.min.js"></script>
<script src="<?php echo base_url()?>adminAssets/js/jquery.mapael.min.js"></script>
<script src="<?php echo base_url()?>adminAssets/js/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>adminAssets/js/Chart.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>adminAssets/js/summernote-bs4.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url()?>adminAssets/js/dashboard2.js"></script>

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