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
                              <h4 class="card-title">User Documents</h4>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">

                              <table id="userDocsTable" class="table table-bordered table-responsive">
                                  <thead>
                                      <tr>                                          
                                          <th>User Id</th>
                                          <th>Service</th>
                                          <th>Email</th>
                                          <th>Phone No.</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php if (isset($user_services) && !empty($user_services)) {
                                            for ($i = 0; $i < count($user_services); $i++) { ?>
                                              <tr>                                                  
                                                  <td><?php echo $user_services[$i]['user_id'] ?></td>
                                                  <td><?php echo $user_services[$i]['service_name'] ?></td>
                                                  <td><?php echo $user_services[$i]['email'] ?></td>
                                                  <td><?php echo $user_services[$i]['contact_no'] ?></td>
                                                  <td><?php echo $user_services[$i]['status'] ?></td>
                                                  <?php $data = base64_encode(json_encode(array($user_services[$i]['service_id'],$user_services[$i]['user_id']))); ?>
                                                  <td class="text-center">
                                                  <?php if($user_services[$i]['status'] == 'Documents Uploaded'){ ?>
                                                      <a href="<?php echo base_url('BackendTeam/approveDocuments/').$data ?>" title="Verify User Documents" class="btn btn-success btn-sm">View</a>
                                                  <?php } else { ?>
                                                    <a href="#" title="Send reminder to user for uploading documents" class="btn btn-danger btn-sm sentMail">Send Mail</a>
                                                    <?php } ?>
                                                    </td>
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
              </div>
          </div>

          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>

  <script>
      $(document).ready(function() {
          $('#userDocsTable').DataTable();
      })
  </script>