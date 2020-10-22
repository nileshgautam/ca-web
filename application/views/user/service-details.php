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
                <table id="service-datatable" class="table">
                  <thead>
                    <td>#</td>
                    <td>Service Name</td>
                    <td>Required document</td>
                    <td class="text-center">Action</td>
                  </thead>
                  <tbody id="documentTable">
                    <?php
                    $docCount = 0;
                    $uploadCount = isset($uploadwedDocs[0]) ? count($uploadwedDocs) : 0;
                    // echo "<pre>";
                    // print_r($docService);die;
                    if (count($documents[0]) > 0) {
                      for ($i = 0; $i < count($documents[0]); $i++) {
                        $document = json_decode($documents[0][$i]['documents'], true);
                        $docCount = $docCount + count($document);
                        for ($j = 0; $j < count($document); $j++) {
                          $rowspan = count($document);
                          // echo "<pre>";
                          // print_r($documents);
                          // // print_r($uploadwedDocs);
                          // die;
                    ?>
                          <tr class="<?php echo $j == 0 ? 'border-top' : '' ?>">
                            <?php if ($j == 0) { ?>
                              <td style="vertical-align:middle" rowspan=<?php echo $rowspan ?>><?php echo $i + 1 ?></td>
                              <td style="vertical-align:middle" rowspan=<?php echo $rowspan ?>><?php echo isset($documents[1][0]['service_name']) ? $documents[1][0]['service_name'] : $documents[1][$i] ?></td>
                            <?php } ?>
                            <td><?php echo $document[$j] ?></td>
                            <td>
                              <?php if (isset($uploadwedDocs) && !empty($uploadwedDocs)) {
                                $files = null;
                                for ($k = 0; $k < count($uploadwedDocs); $k++) {
                                  if ($document[$j] == $uploadwedDocs[$k]['document_name'] && $documents[0][$i]['service_id'] == $uploadwedDocs[$k]['service_id']) {
                                    $files = $uploadwedDocs[$k];
                                  }
                                }
                                // echo "<pre>";
                                // print_r($files['status']);
                                // // print_r($uploadwedDocs);
                                // die;

                                if ($files != null) {
                                  $name = explode('/', $files['Document_path']);
                                  $name = end($name);
                                  $ext = explode('.', $name);
                                  $ext = end($ext);
                              ?>
                                  <!-- <i class="fa fa-check-circle-o text-success" aria-hidden="true"></i> -->
                                  <img src="<?php if ($ext == 'pdf') {
                                              echo base_url('assets/image/icon/pdf.svg');
                                            } else if ($ext == 'doc' || $ext == 'docx') {
                                              echo base_url('assets/image/icon/word.svg');
                                            } else {
                                              echo base_url($files['Document_path']);
                                            }
                                            ?>" width="30" file_src="<?php echo base64_encode(base_url($files['Document_path'])) ?>" type="<?php echo $ext ?>" alt="<?php echo $document[$j] ?>">
                                  <form method="post" class="col-sm-2" action="<?php echo base_url('User/uploadFile') ?>" enctype='multipart/form-data' style="display: inline-block;top: 8px;">
                                    <div>
                                      <?php if ($docService[0]['docSubmit'] != 'true' && $files['status'] == 'R' || $docService[0]['status'] == 'Payment Received' && $files['status'] == 'U') { ?>
                                        <label for="uploadFile<?php echo $i . $j ?>" title="Edit Document"><i class="fa fa-pencil-square-o"></i></label>
                                        <input type="file" hidden name="file" class="form-control-file" id="uploadFile<?php echo $i . $j ?>">
                                       
                                      <?php } ?>
                                      <input hidden name="mService_id" value="<?php echo $docService[0]['service_id'] ?>" required>
                                      <input hidden name="service_id" value="<?php echo $documents[0][$i]['service_id'] ?>" required>
                                      <input hidden name="current_url" value="<?php echo current_url() ?>" required>
                                      <input hidden name="document_name" value="<?php echo $document[$j] ?>" required>
                                    </div>
                                  </form>
                                <?php } else {
                                ?>

                                  <form method="post" action="<?php echo base_url('User/uploadFile') ?>" enctype='multipart/form-data'>
                                    <div class="form-group mb-0">
                                      <label for="uploadFile<?php echo $i . $j ?>" title="Upload Document"><i class="ti-upload"></i></label>
                                      <input type="file" hidden name="file" class="form-control-file" id="uploadFile<?php echo $i . $j ?>">
                                      <input hidden name="mService_id" value="<?php echo $docService[0]['service_id'] ?>" required>
                                      <input hidden name="service_id" value="<?php echo $documents[0][$i]['service_id'] ?>" required>
                                      <input hidden name="current_url" value="<?php echo current_url() ?>" required>
                                      <input hidden name="document_name" value="<?php echo $document[$j] ?>" required>
                                    </div>
                                  </form>
                                <?php

                                }
                              } else { ?>
                                <form method="post" action="<?php echo base_url('User/uploadFile') ?>" enctype='multipart/form-data'>
                                  <div class="form-group mb-0">
                                    <label for="uploadFile<?php echo $i . $j ?>"><i class="ti-upload"></i></label>
                                    <input type="file" hidden name="file" class="form-control-file" id="uploadFile<?php echo $i . $j ?>">
                                    <input hidden name="service_id" value="<?php echo $documents[0][$i]['service_id'] ?>" required>
                                    <input hidden name="mService_id" value="<?php echo $docService[0]['service_id'] ?>" required>
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
                <button <?php echo $docCount - $uploadCount != 0 ? 'disabled' : '' ?> <?php echo $docService[0]['docSubmit'] == 'true' ? 'disabled' : '' ?> uploaded="<?php echo $uploadCount ?>" count="<?php echo $docCount - $uploadCount ?>" id="fSubmit" sId='<?php echo base64_encode($docService[0]['service_id']) ?>' class="btn btn-primary float-right <?php echo $docCount - $uploadCount != 0 ? 'no-drop' : '' ?> <?php echo $docService[0]['docSubmit'] == 'true' ? 'no-drop' : '' ?>" title="Submit Documents when all documents will be uploaded">Submit</button>
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

      Notiflix.Notify.Warning(error)
    </script>
  <?php } ?>
  <?php if (!empty($this->session->flashdata('success'))) { ?>
    <script>
      let error = '<?php echo $this->session->flashdata('success'); ?>';

      Notiflix.Notify.Success(error)
    </script>
  <?php } ?>