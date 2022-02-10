

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Meeting Schedule With Client</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo BASE_PATH; ?>viewmeetingschedule">View Meeeting Schedule</a></li>
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
            <h3 class="card-title">Add New Meeting Schedule With Client (Sends Internal Notification)</h3>

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
          <form id="scheduleForm" name="scheduleForm" action="" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Your Email</label>
                  <input type="text" name="emp_email" id="emp_email" class="form-control" value="<?php echo $_SESSION['emp_email']; ?>" readonly>
                </div> 

                <div class="form-group">
                  <label>Client Email</label>
                  <input type="text" class="form-control" name="client_email" id="client_email" tabindex="3" >
                </div>             
                
                <div class="form-group">
                  <label>Client contact number*</label>
                  <input type="text" class="form-control" name="client_no" id="client_no" tabindex="5" >
                </div>                 

                <div class="form-group">
                  <label>Meeting Date*</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input"  data-target="#reservationdate" name="schedule_date" id="schedule_date" value="" tabindex="7"  readonly/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                  </div>
                </div>
               
              </div>
              <!-- /.col -->
              <div class="col-md-6">            

                <div class="form-group">
                  <label>Company Name*</label>
                  <input type="text" class="form-control" name="comp_name" id="comp_name" tabindex="1" >
                </div>

                <div class="form-group">
                  <label>Purpose of Meeting*</label>
                  <input type="text" class="form-control" name="purpose" id="purpose" tabindex="4" >
                </div>

                <div class="form-group">
                  <label>Office Address*</label>
                  <input type="text" class="form-control" name="office_address" id="office_address" tabindex="6" >
                </div>

                <!-- /.form-group -->
                <div class="form-group">
                  <label>Meeting Time*</label>
                  <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" name="schedule_time" id="schedule_time"  class="form-control datetimepicker-input" data-target="#timepicker" tabindex="8"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
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