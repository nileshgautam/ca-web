<div class="container" style="height:100vh;">
  <!-- Outer Row -->
  <div class="row justify-content-center" style="height:100%;">

    <div class="col-xl-10 col-lg-12 col-md-9" style="align-self: center;">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-register-image" style=" background: url('<?php echo base_url('assets/image/index/bg1.jpg'); ?>');background-size: 100% 100%;"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form id="form1" method="post" action="<?php echo base_url('Login/register_user')?>">                  
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>

                  </div>
                  <div class="form-group">
                    <input type="text" name="email" class="form-control has-error" placeholder="Email Address" required>
                  </div>
                  <div class="form-group">
                    <input type="number" name="number" class="form-control has-error" placeholder="Phone No." required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="state" class="form-control has-error" placeholder="State" required>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" id="new-password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="password" id="confirm-password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                    </div>
                  </div>
                  <button id="btn" class="btn btn-primary btn-user btn-block">
                    Register
                  </button>
                  <!-- <hr>
            <a href="index.html" class="btn btn-google btn-user btn-block">
              <i class="fab fa-google fa-fw"></i> Register with Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
              <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
            </a> -->
                </form>
                <hr>
                <!-- <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
          </div> -->
                <div class="text-center">
                  <a class="small" href="<?php echo base_url('Login') ?>">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
