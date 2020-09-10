<div class="pcoded-content">
  <div class="container col-sm-8">

    <div class="col-md-12">
      <h5 class="d-inline-block mb-3 mt-2 font-weight-500 ">Setting</h5>
    </div>

    <div class="card">

      <form action="" class="p-3">
        <strong for="">Profile</strong>
        <div class="form-group"><label for="first-name">First Name</label>
          <input type="text" name="first-name" id="first-name" class="form-control">
        </div>
        <div class="form-group">
          <label for="last-name">Last Name</label>
          <input type="text" name="last-name" id="last-name" class="form-control">
        </div>
        <div class="form-group">
          <label for="dob">Date Of Birth</label>
          <input type="date" name="dob" id="dob" class="form-control">
        </div>
        <div class="form-group ">
          <input type="submit" value="Update" class="form-control btn-sm btn-primary col-sm-2 float-right">
        </div>
      </form>

      <form action="" method="post" class="p-3">
        <strong class="py-2 mb-2">Change password</strong>
        <div class="form-group"><label for="new-password">New Password</label>
          <input type="password" name="new-password" id="new-password" class="form-control">
        </div>
        <div class="form-group">
          <label for="confirm-password">Confirm Password</label>
          <input type="password" name="confirm-password" id="confirm-password" class="form-control">
        </div>

        <div class="form-group ">
          <a class="form-control btn-sm btn-danger col-sm-2 float-right text-center" href="<?php echo base_url('User/') ?>">Cancel</a>
          <input type="submit" value="Update" class="form-control btn-sm btn-primary col-sm-2 float-right">
        </div>


      </form>
    </div>


  </div>

</div>