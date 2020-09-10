<!-- Content Wrapper. Contains page content -->
<div class="pcoded-content">


  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 py-2 mb-3 mt-3">

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped" id="paymentTable">
                  <thead>
                    <tr>
                      <th>Purchased Date</th>
                      <th>Tranzaction Id</th>
                      <th>Service</th>
                      <th>Package</th>                      
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($payments) && !empty($payments)) {
                      for ($i = 0; $i < count($payments); $i++) { ?>
                        <tr>
                          <td><?php echo $payments[$i]['dateTime'] ?></td>
                          <td><?php echo $payments[$i]['tranzactionId'] ?></td>
                          <td><?php echo $payments[$i]['service_name'] ?></td>
                          <td><?php echo $payments[$i]['package'] ?></td>                          
                          <td><?php echo $payments[$i]['price'] ?></td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
  $(document).ready( function () {
    $('#paymentTable').DataTable();
} );
</script>