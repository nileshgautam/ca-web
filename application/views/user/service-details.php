  <!-- Content Wrapper. Contains page content -->
  <div class="pcoded-content py-2">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Upload Documents</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="service-datatable" class="table table-bordered table-striped">
                  <thead>
                    <td>#</td>
                    <td>Service Name</td>
                    <td>Required document</td>
                    <td>Action</td>
                  </thead>
                  <tbody id="documentTable">
                    <?php 
                    // echo "<pre>";
                    // print_r($documents);
                    if (count($documents[0]) > 0) {
                      for ($i = 0; $i < count($documents[0]); $i++) {
                        $document = json_decode($documents[0][$i]['documents'], true);
                        for ($j = 0; $j < count($document); $j++) {
                          $rowspan = count($document);
                          // echo "<pre>";
                          // print_r($documents[1][$i]);
                          // print_r($uploadwedDocs);
                          // die;
                    ?>
                          <tr>
                            <?php if ($j == 0) { ?>
                              <td style="vertical-align:middle" rowspan=<?php echo $rowspan ?>><?php echo $i + 1 ?></td>
                              <td style="vertical-align:middle" rowspan=<?php echo $rowspan ?>><?php echo isset($documents[1][0]['service_name']) ? $documents[1][0]['service_name'] : $documents[1][$i]?></td>
                            <?php } ?>
                            <td><?php echo $document[$j] ?></td>
                            <td>
                              <?php if (isset($uploadwedDocs) && !empty($uploadwedDocs)) {
                                $files = null;
                                for ($k = 0; $k < count($uploadwedDocs); $k++) {
                                  if ($document[$j] == $uploadwedDocs[$k]['document_name']) {
                                    $files = $uploadwedDocs[$k];
                                  }
                                }

                                if ($files != null) {
                              ?>
                                  <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i>
                                  <img src="<?php echo base_url($files['Document_path']) ?>" width="30" alt="<?php echo $document[$j] ?>">           

                                  <?php } else { 
                                  ?>
                                    
                                    <form method="post" action="<?php echo base_url('User/uploadFile') ?>" enctype='multipart/form-data'>
                                      <div class="form-group">
                                        <label for="uploadFile<?php echo $i . $j?>"><i class="ti-upload"></i></label>
                                        <input type="file" hidden name="file" class="form-control-file" id="uploadFile<?php echo $i . $j?>">
                                        <input hidden name="service_id" value="<?php echo $documents[0][$i]['service_id'] ?>" required>
                                        <input hidden name="current_url" value="<?php echo current_url() ?>" required>
                                        <input hidden name="document_name" value="<?php echo $document[$j] ?>" required>
                                      </div>
                                    </form> 
                              <?php

                              }} else { ?>
                                <form method="post" action="<?php echo base_url('User/uploadFile') ?>" enctype='multipart/form-data'>
                                  <div class="form-group">
                                    <label for="uploadFile<?php echo $i . $j ?>"><i class="ti-upload"></i></label>
                                    <input type="file" hidden name="file" class="form-control-file" id="uploadFile<?php echo $i . $j ?>">
                                    <input hidden name="service_id" value="<?php echo $documents[0][$i]['service_id'] ?>" required>
                                    <input hidden name="current_url" value="<?php echo current_url() ?>" required>
                                    <input hidden name="document_name" value="<?php echo $document[$j] ?>" required>
                                  </div>
                                </form>
                              <?php } ?>

                            </td>
                          </tr>
                    <?php }
                      }
                    } ?>
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- image show Modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: max-content !important;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>
  <!-- Message pop up -->
  <?php if (!empty($this->session->flashdata('error'))) { ?>
    <script>
      let error = '<?php echo $this->session->flashdata('error'); ?>';
      console.log(error)
      Notiflix.Notify.Warning(error)
    </script>
  <?php } ?>
  <?php if (!empty($this->session->flashdata('success'))) { ?>
    <script>
      let error = '<?php echo $this->session->flashdata('success'); ?>';
      console.log(error)
      Notiflix.Notify.Success(error)
    </script>
  <?php } ?>