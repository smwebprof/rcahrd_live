

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Presentation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo BASE_PATH; ?>/Viewusermaster">Upload Presentation</a></li>
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
            <ul>
              <li>Note : Download Sample Template is provided to fill data and Upload File Data.</li>
              <li>You Can Remove Columns From Data Sheet.</li>
              <li>Commodity Name in Data Sheet Should not be Empty.</li>
              <li>Every column should have maximum 65 Characters.</li>
            </ul>  

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
          <form id="uploadForm" name="uploadForm" action="" enctype="multipart/form-data" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputFile">Select Commodity</label>
                    <select class="form-control select2" style="width: 70%;" name="commodity" id="commodity">
                    <option value="">Select</option>
                    <?php $rows = $this->data['commodity_details'];
                      
                    foreach($rows as $commodity_details){
                    ?>
                    <option value="<?php echo $commodity_details['id']; ?>"><?php echo $commodity_details['commodity_name']; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label>Select Subgroup (Type)</label>
                  <select class="form-control select2" style="width: 70%;" name="commodity_type" id="commodity_type">
                    <option value="">Select</option>
                  </select>
                  </div>            
                
                <!--<div class="form-group">
                  <label>Emp Last Name</label>
                  <input type="text" class="form-control" name="emp_lname" id="emp_lname" >
                </div>                 

                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="emp_email" id="emp_email">
                </div>


                <div class="form-group">
                  <label>Pasword</label>
                  <input type="password" class="form-control" name="emp_pass" id="emp_pass">
                </div>-->
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="commodity_file">Upload File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="commodity_file" name="commodity_file">
                        <label class="custom-file-label" for="commodity_file">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <!--<button class="btn btn-primary input-group-text">Upload</button>-->
                        <button class="btn btn-primary float-right">Upload</button>
                      </div>
                    </div>
                  </div> 
                <div class="form-group">
                  <label>Download Sample File</label>
                  <div class="input-group-append">                      
                        <a href="<?php echo BASE_PATH; ?>uploads/commodity_template.xlsx"><span class="input-group-text bg-red">Commodity Sample File</span></a>
                  </div>
                </div>

                <!--<div class="form-group">
                  <label>Emp Code</label>
                  <input type="text" class="form-control" name="emp_code" id="emp_code">
                </div>

                <div class="form-group">
                  <label>User Type</label>
                  <select class="form-control select2" style="width: 100%;" name="emp_type" id="emp_type">
                    <option>Office Staff</option>
                    <option>Admin</option>
                    <option>Custom</option>
                  </select>
                </div>-->

                <!-- /.form-group -->
                <!--<div class="form-group">
                  <label>Confirm Pasword</label>
                  <input type="password" class="form-control"  name="emp_cnfpass" id="emp_cnfpass">
                </div>-->                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!--<button class="btn btn-primary">Submit</button>-->
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