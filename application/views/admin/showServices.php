<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <!-- Main content -->
  <section class="content pt-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Services</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Service</th>
                    <th>Price</th>
                    <th style="width:400px">Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="services">
                  <?php if (count($services) > 0) {
                    for ($i = 0; $i < count($services); $i++) {
                  ?>
                  <tr>
                    <td><?php echo $i+1 ?></td>
                    <td><?php echo $services[$i]['service_name'] ?></td>
                    <td><?php echo $services[$i]['service_price'] ?></td>
                    <td><?php echo $services[$i]['service_short_description'] ?></td>
                    <td class="action-icons"><i class="fas fa-trash delete" data-id='<?php echo $services[$i]['id'] ?>'></i>
                        <i class="far fa-edit edit" data-id='<?php echo $services[$i]['id'] ?>'></i></td>
                  </tr>

                  <?php }
                  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>