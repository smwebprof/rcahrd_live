


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Self Assessment Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">SelfForm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Employee Self Evaluation & Assessment Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="selfForm" action ="" name="selfForm" method="POST">
              <input type="hidden" name="form_id" value="1">
          <?php
          $details = $this->data['emp_details'];
                  
          foreach ($details as $p =>$q) {
          ?>
          <div class="row">
          <div class="col-md-6">
            <div class="card">
              <!--<div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Description Horizontal
                </h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">Name:</dt>
                  <dd class="col-sm-8"><?php echo $q['emp_first_name']." ".$q['emp_last_name']; ?></dd>
                  <dt class="col-sm-4">Job Title:</dt>
                  <dd class="col-sm-8"><?php echo $q['designation_name']; ?></dd>
                  <dt class="col-sm-4">Department:</dt>
                  <dd class="col-sm-8"><?php echo $q['department_name']; ?></dd>
                  <dt class="col-sm-4">Immediate Supervisor</dt>
                  <dd class="col-sm-8"><?php echo $q['fname']." ".$q['lname']; ?>
                  </dd>
                </dl>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            <div class="card">
              <!--<div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Description Horizontal
                </h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">Date:</dt>
                  <dd class="col-sm-8"><?php echo date('d/m/Y'); ?></dd>
                  <dt class="col-sm-4">Location:</dt>
                  <dd class="col-sm-8"><?php echo $q['branch_name']; ?></dd>
                  <dt class="col-sm-4">Employee Joining Date:</dt>
                  <dd class="col-sm-8"><?php echo date('d/m/Y',strtotime($q['joining_date'])); ?></dd>
                  <dt class="col-sm-4">Employee Code:</dt>
                  <dd class="col-sm-8"><?php echo $q['emp_id']; ?>
                  </dd>
                </dl>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <?php } ?>
                <div class="card-body">
                  <!--<div class="form-group">
                    <label for="exampleInputEmail1"><p class="text-danger"><u>Employee Instructions:
Please complete and return this self-evaluation to your HR Team</u></p>
                    </label>
                  </div>-->
                  <!--<div class="form-group">
                    <label for="exampleInputEmail1">Your thorough and timely participation in the appraisal process will help facilitate a fair and comprehensive review of
your progress and accomplishments since your last performance review. If you have been employed by the company
less than a year, substitute references to "since the last review" with "since you were hired" and answer the questions
accordingly.</label>
                  </div>-->
                  <?php
                  $questions = $this->data['questions'];
                  
                  foreach ($questions as $k =>$v) { 
                    if (!empty($this->data['catquestions'][$v['id']])) { ?>
                      <div class="form-group">
                      <label for="exampleInputEmail1"  style="font-weight:500;"><?php echo $v['id']." ".$v['question_descriptioin'];?></label>
                      </div>
                      <div class="card">
                      <div class="card-header">
                      <h3 class="card-title">Rating Scale:  4 - Outstanding  3 - Very Competent
                      2 - Satisfactory  1 - Inexperienced or Improvement Needed
                      </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Category </th>
                              <th>Self-Rating </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $x = 'a';
                            for ($i=0;$i<count($this->data['catquestions'][$v['id']]);$i++) {?>
                            <tr>
                              <td><?php echo $x; ?>.</td>
                              <td><?php echo $this->data['catquestions'][$v['id']][$i]; ?></td>
                              <td>
                                <div>
                                  <?php echo $this->data['catans'][$v['id'].$x]; ?>
                                </div>
                              </td>
                            </tr>
                            <input type="hidden" name="main_question[]" value="<?php echo $v['id'].$x; ?>"?>
                            <?php $x++;}  
                            ?>
                            </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    <?php } else { ?>
                      <div class="form-group">
                      <label for="exampleInputEmail1"  style="font-weight:500;"><?php echo $v['id']." . ".$v['question_descriptioin'];?></label>
                      <textarea class="form-control" rows="3" name="self_que_<?php echo $v['id']; ?>" id="self_que_<?php echo $v['id']; ?>" readonly><?php echo $v['breifanswer']; ?></textarea>
                      <input type="hidden" name="main_question[]" value="<?php echo $v['id']; ?>"?>
                      </div>
                    <?php } ?>
                  <?php }
                  ?>
                <div class="form-group mb-0">
                    <input type="hidden" name="total_questions" value="<?php echo $this->data['totalquestions']; ?>"?>
                    Thank you for taking the time to complete the Employee Self Evaluation & Assessment Form!
                  </div>
                </div>
                <!-- /.card-body -->                 
                <?php /*<div class="card-footer">
                  <button type="button" class="btn btn-primary float-middle" name="save_btn" id="save_btn">Save</button>
                  <a href="<?php echo BASE_PATH; ?>dashboard"><button type="button" class="btn btn-warning float-middle">Cancel</button></a>
                  <button type="submit" class="btn btn-success float-middle">Submit</button>
                </div>*/ ?>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  