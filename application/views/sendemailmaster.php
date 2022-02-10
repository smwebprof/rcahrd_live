
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Send Email</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo BASE_PATH; ?>Dashboard">Dashboad</a></li>
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
            <h3 class="card-title">Send Email</h3>

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
          <form id="commoditylinkForm" name="commoditylinkForm" action="" method="post">
          <?php $rows = $this->data['commodity_link_details'];
                      
          foreach($rows as $commodity_link_details){
          ?>
          <input type="hidden" name="link_id" id="link_id" class="form-control" value="<?php echo $commodity_link_details['id']; ?>">
          <input type="hidden" name="link_file" id="link_file" class="form-control" value="<?php echo $commodity_link_details['commodity_link_path']; ?>">

          <?php if (@$_GET['msg']==1) { echo '&nbsp;&nbsp;&nbsp;<font color="red">Mail Sent Successfully</font>'; } ?>
          <?php if (@$_GET['msg']==2) { echo '&nbsp;&nbsp;&nbsp;<font color="red">Mail Has Some Issue!!!</font>'; } ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Presentation Link</label><br>
                  <label><a href="<?php echo $commodity_link_details['commodity_link_path']; ?>" target="_blank"><?php echo $commodity_link_details['commodity_link_path']; ?></a></label>
                  <!--<input type="text" name="link_id" id="link_id" class="form-control">-->
                </div>
                <div class="form-group">
                  <label>Company Name</label>
                  <input type="text" name="link_client" id="link_client" class="form-control">
                </div>                 
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="link_email" id="link_email" class="form-control" value="">
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
                <table cellspacing="2" cellpadding="1" border="0">
                  <tr><td width="50%"></td><td width="30%"><font color="red"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dr Amin Controllers Pvt. Ltd</strong></font></td><td width="30%"></td></tr>
                  <tr><td width="50%"></td><td width="30%"><img src="<?php echo $this->data['qr_code_path'];?>" /></td><td width="30%"></td></tr>
                </table> 
              </div>
            </div>
            <!-- /.row -->
            <button class="btn btn-primary">Submit</button><br/>
            <font color="red">***Note : Please mark our Email Sent as not SPAM.</font>
          </div>
          <?php } ?>
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