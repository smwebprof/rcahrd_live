<?php if (@$_GET['msg']==1) { ?>
  <script>
    alert('Data Saved Successfully!!!');
  </script>  
<?php } ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">Welcome To RCA Business Promotion Portal!!!</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <?php /*<div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
            */ ?>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Schedule Meeting With Client List</h3>
                <div class="col-12">
                  <!--<a href="<?php echo BASE_PATH; ?>addclientinteraction"><button type="button" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Add To Existing
                  </button></a>-->
                  <a href="<?php echo BASE_PATH; ?>addmeetingschedule"><button type="button" class="btn btn-primary float-right"  style="margin-right: 5px;"><i class="fas fa-plus"></i> Add New Schedule
                  </button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dashboardfrm" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Client Name</th>
                    <th>Purpose Of Meeting</th>
                    <th>Client Email</th>
                    <th>Contact Number</th>
                    <th>Office Address</th>
                    <th>Meeting Date and Time</th>
                    <!--<th>View</th>-->
                    <!--<th>Edit</th>-->
                  </tr>
                  </thead>
                  <tbody>
                  <?php $rows = $this->data['interaction_data']; $i=1; 
                  foreach ($rows as $interaction_data) {
                  ?>
                  <tr>
                    <th><?php echo $i; ?></th>
                    <td><?php echo $interaction_data['client_name']; ?></td>
                    <td title="<?php echo $interaction_data['purpose_meeeting']; ?>"><?php echo $interaction_data['purpose_meeeting']; ?></td>
                    <td title="<?php echo $interaction_data['client_email']; ?>"><?php echo $interaction_data['client_email']; ?></td>
                    <td title="<?php echo $interaction_data['client_contact']; ?>"><?php echo $interaction_data['client_contact']; ?></td>
                    <td title="<?php echo $interaction_data['office_address']; ?>"><?php echo $interaction_data['office_address']; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($interaction_data['meeting_date']))." ".$interaction_data['meeting_time']; ?></td>
                    <?php /*<td><a href="<?php echo BASE_PATH; ?>Fullviewclientinteraction?id=<?php echo base64_encode($interaction_data['id']); ?>"><button type="button" class="btn btn-warning float-middle">View</button></a></td>
                    <?php /*<td><a href="<?php echo BASE_PATH; ?>SendEmailMaster?id=<?php echo base64_encode($interaction_data['id']); ?>"><button type="button" class="btn btn-warning float-middle">Edit</button></a></td>*/ ?>
                  </tr>
                  <?php 
                   $i++; }
                  ?>
                  </tbody>  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <?php /*<div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Online Store Overview</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="ion ion-ios-refresh-empty"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> 12%
                    </span>
                    <span class="text-muted">CONVERSION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                    <span class="text-muted">SALES RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                    <span class="text-muted">REGISTRATION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                */ ?>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
