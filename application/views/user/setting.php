<div class="pcoded-content">
  <div class="container col-sm-8">

    <div class="col-md-12">
      <h5 class="d-inline-block mb-3 mt-2 font-weight-500 ">Setting</h5>
    </div>

    <div class="card">
      <form action="<?php echo base_url('User/updateProfile') ?>" method="post" class="p-3">
        <strong class="col-sm-12 profile">Profile</strong>     
          
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $user[0]['name']?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" readonly name="email" value="<?php echo $user[0]['email']?>" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="number">Phone No.</label>
            <input type="text" name="number" id="number" value="<?php echo $user[0]['contact_no']?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="state">State</label>
            <input type="text" name="state" id="state" value="<?php echo $user[0]['state']?>" class="form-control">
          </div>
          <div class="form-group ">
            <input type="submit" value="Update" class="form-control btn-sm btn-primary col-sm-2 float-right">
          </div>
      
      </form>
      <form action="<?php echo base_url('User/updatePassword') ?>" method="post" class="p-3 pass-form">
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