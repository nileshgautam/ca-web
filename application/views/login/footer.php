<!-- Bootstrap -->
<script src="<?php echo base_url()?>adminAssets/js/bootstrap.bundle.min.js"></script>
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
<!-- custom Js -->
<script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>

</html>