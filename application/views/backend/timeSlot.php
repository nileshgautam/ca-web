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
                              <h4 class="card-title">Add Available Timeslots</h4>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <form action="<?php echo base_url('BackendTeam/saveTimeSlot') ?>" method="post">
                                  <div class="row m-0">
                                      <h6 class="col-sm-12">Choose Date</h6>
                                      <div class="form-group col-sm-6">
                                          <label for="fDate">From</label>
                                          <input type="date" class="form-control" name="fDate" id="fDate" required>
                                      </div>
                                      <div class="form-group col-sm-6">
                                          <label for="tDate">To</label>
                                          <input type="date" class="form-control" name="tDate" id="tDate" required>
                                      </div>

                                      <h6 class="col-sm-12">Choose Time</h6>
                                      <div class="form-group col-sm-6">
                                          <label for="fTime">From</label>
                                          <input type="time" class="form-control" name="fTime" id="fTime" required>
                                      </div>
                                      <div class="form-group col-sm-6">
                                          <label for="tTime">To</label>
                                          <input type="time" class="form-control" name="tTime" id="tTime" required>
                                      </div>
                                      <div class="col-sm-12">
                                          <input type="submit" class="btn btn-primary float-right" value='Save'>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>