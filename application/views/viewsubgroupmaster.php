  <?php if (@$_GET['msg']==1) { ?>
  <script>
    alert('Data Saved Successfully!!!');
  </script>  
<?php } ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Sub Group Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
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
              <div class="card-header">
                <h3 class="card-title">View Sub Group Master</h3>                  
                  <a href="<?php echo BASE_PATH; ?>addsubgroupmaster"><button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Sub Group</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Commodity</th>
                    <th>Sub Group Name</th>                    
                    <!--<th>Entry Date</th>-->
                    <th>Status</th>
                    <!--<th>View Report</th>-->
                    <!--<th>Verify</th>-->
                    <th>Edit</th>
                    <!--<th>Give Add Form Access</th>-->
                  </tr>
                  </thead>
                  <tbody>
                  <?php $rows = $this->data['item_details']; 
                  $i=1;
                  foreach ($rows as $k =>$v) {
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $v['commodity_name']; ?></td>
                    <td><?php echo $v['name']; ?></td>                    
                    <?php /*<td><?php echo date('d-m-Y',strtotime($v['entry_date'])); ?></td>*/ ?>
                    <td><?php if ($v['is_active']==1) { echo 'Active';} else {echo 'InActive';} ?></td>
                    <?php /*<td><a href="<?php echo BASE_PATH; ?>fullviewselfreport?id=<?php echo base64_encode($v['rsa_id']); ?>"><button type="button" class="btn btn-info float-middle">View Report</button></a>
                    </td>*/ ?>
                    <?php /*<td>
                        <?php if ($v['status']!='Approved') { ?>
                        <a href="<?php echo BASE_PATH; ?>Updateformstatus?id=<?php echo base64_encode($v['rsa_id']); ?>"><button type="button" class="btn btn-warning float-middle">Approve</button></a>
                        <?php } ?>
                    </td>*/ ?>
                    <td>
                        <a href="<?php echo BASE_PATH; ?>editsubgroupmaster?id=<?php echo base64_encode($v['id']); ?>"><button type="button" class="btn btn-warning float-middle">Edit</button></a>
                    </td>
                    <?php /*<td>
                        <a href="<?php echo BASE_PATH; ?>Updateselfformstatus?id=<?php echo base64_encode($v['id']); ?>"><button type="button" class="btn btn-info float-middle">Add</button></a>
                    </td>*/ ?>
                  </tr>
                  <?php $i++; } ?>                  
                  </tbody>
                  <!--<tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>-->
                </table>
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