
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="<?php echo ASSETS_PATH; ?>img/dacpl_logo1.jpg" alt="AdminLTELogo" height="59" width="49">
      <a href="./" class="h4" style="color:red;"><b>RCA</b> Business Promotion Portal</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in with RCA login Empcode or Email</p>

      <form id="loginForm" name="loginForm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Employee Code OR Email" name="emp_code">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="emp_pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <?php /*<div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>*/?>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php /*
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>*/?>
      <!-- /.social-auth-links -->
      <?php /*
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> */?>
      <?php if (@$_GET['msg']==1) { ?>
      <br>
      <p class="mb-0">
        <font color="red">Employee Details Doesnot Exists!!!</font>
      </p>
      <?php } ?>
      <?php if (@$_GET['msg']==2) { ?>
      <br>
      <p class="mb-0">
        <font color="red">Incorrect Financial Year!!!</font>
      </p>
      <?php } ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


