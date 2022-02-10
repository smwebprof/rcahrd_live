

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo BASE_PATH; ?>/Viewusermaster">User Master</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add User</h3>

            <!--<div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>-->
          </div>
          <!-- /.card-header -->
          <form id="userForm" name="userForm" action="" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="emp_fname" id="emp_fname" class="form-control">
                </div> 

                <div class="form-group">
                  <label>Middle Name</label>
                  <input type="text" class="form-control" name="emp_mname" id="emp_mname">
                </div>             
                
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="emp_lname" id="emp_lname" >
                </div>                 

                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="emp_email" id="emp_email">
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">            

                <div class="form-group">
                  <label>Emp Code</label>
                  <input type="text" class="form-control" name="emp_code" id="emp_code">
                </div>

                <div class="form-group">
                  <label>Type</label>
                  <select class="form-control select2" style="width: 100%;" name="emp_type" id="emp_type">
                    <option>Office Staff</option>
                    <option>Admin</option>
                    <option>Custom</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Pasword</label>
                  <input type="password" class="form-control" name="emp_pass" id="emp_pass">
                </div>

                <!-- /.form-group -->
                <div class="form-group">
                  <label>Confirm Pasword</label>
                  <input type="password" class="form-control"  name="emp_cnfpass" id="emp_cnfpass">
                </div>                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <button class="btn btn-primary">Submit</button>
          </div>
          </form>
          <!-- /.card-body -->
          <!--<div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>-->
        </div>
        <!-- /.card -->
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
  <!-- /.content-wrapper -->