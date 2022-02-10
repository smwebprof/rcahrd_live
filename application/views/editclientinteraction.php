

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Client Interaction Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo BASE_PATH; ?>/Viewclientinteraction">View Interaction List</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Client Details</h3>

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
          <?php $rows = $this->data['interaction_data'];
                      
          foreach($rows as $interaction_data){
          ?>
          <form id="newinteractionForm" name="newinteractionForm" action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Company*</label>
                  <input type="text" class="form-control" placeholder="" name="int_company" id="int_company" tabindex="1" value="<?php echo $interaction_data['client_name']; ?>" readonly>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Name*</label>
                  <input type="text" class="form-control" placeholder="" name="int_full_name" id="int_full_name" tabindex="3" value="<?php echo $interaction_data['full_name']; ?>" readonly>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                  <label>Country*</label>
                  <select class="form-control" name="company_country" id="company_country" tabindex="5" disabled>
                                <option value="">Select Country</option>  
                                  <?php
                                          $rows = $this->data['countries'];

                                          foreach($rows as $countries){ 
                                            if ($countries["id"]==$interaction_data['country_id']) {
                                              echo '<option value='.$countries["id"].' selected>'.$countries["name"].'</option>';

                                            } else {
                                              echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';

                                            }
                                            
                                          } 
                                  ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>City*</label>
                  <select class="form-control" name="company_city" id="company_city" tabindex="7" disabled>
                                <option value="">Select City</option>
                                <?php
                                          $rows = $this->data['cities'];

                                          foreach($rows as $cities){ 
                                            if ($cities["id"]==$interaction_data['city_id']) {
                                              echo '<option value='.$cities["id"].' selected>'.$cities["name"].'</option>';

                                            } else {
                                              echo '<option value='.$cities["id"].'>'.$cities["name"].'</option>';

                                            }
                                            
                                          } 
                                  ?>


                                </select>
                </div>

                <div class="form-group">
                  <label>Email Address*</label>
                  <input type="text" class="form-control" placeholder="" name="int_email_address" id="int_email_address" tabindex="10" value="<?php echo $interaction_data['email_address']; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Alternate Contact</label>
                  <div class="checkbox-list">
                                  <label class="checkbox-inline">
                                  <input type="number" class="form-control" id="int_alt_prefix" name="int_alt_prefix" placeholder="Country Code" style="width:200px;" tabindex="13" value="<?php echo $interaction_data['alt_prefix']; ?>" readonly></label>
                                  <label class="checkbox-inline">
                                  <input type="number" class="form-control" name="int_alt_no" id="int_alt_no" placeholder="Mobile Number" tabindex="14" value="<?php echo $interaction_data['alternate_contact']; ?>" readonly>
                                  </label>
                                </div>
                </div> 

              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                <div class="form-group">
                  <label>Job Title</label>
                  <input type="text" class="form-control" placeholder="" name="int_job_title" id="int_job_title" tabindex="2" value="<?php echo $interaction_data['job_title']; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Office Address*</label>
                  <input type="text" class="form-control" placeholder="" name="int_office_address" id="int_job_title" tabindex="4" value="<?php echo $interaction_data['address'].",".$interaction_data['city'].",".$interaction_data['state'].",".$interaction_data['country']; ?>" readonly>
                  <!--<textarea class="form-control" rows="3" name="int_office_address" id="int_office_address"></textarea>-->
                </div>

                <div class="form-group">
                  <label>State*</label>
                  <select class="form-control" name="company_state" id="company_state" tabindex="6" disabled>
                      <option value="">Select State</option>
                      <?php
                                          $rows = $this->data['states'];

                                          foreach($rows as $states){ 
                                            if ($states["id"]==$interaction_data['state_id']) {
                                              echo '<option value='.$states["id"].' selected>'.$states["name"].'</option>';

                                            } else {
                                              echo '<option value='.$states["id"].'>'.$states["name"].'</option>';

                                            }
                                            
                                          } 
                                  ?>
                  </select>
                </div>

                <!-- /.form-group -->
                <div class="form-group">
                  <label>Office Number*</label>
                  <div class="checkbox-list">
                                  <label class="checkbox-inline">
                                  <input type="number" class="form-control" id="int_office_prefix" name="int_office_prefix" placeholder="Country Code" style="width:200px;" tabindex="8" value="<?php echo $interaction_data['country_code']; ?>" readonly></label>
                                  <label class="checkbox-inline">
                                  <input type="number" class="form-control" name="int_office_no" id="int_office_no" placeholder="Office Number" tabindex="9" value="<?php echo $interaction_data['tel_no']; ?>" readonly>
                                  </label>
                                </div>
                </div>  

                <div class="form-group">
                  <label>Mobile Number*</label>
                  <div class="checkbox-list">
                                  <label class="checkbox-inline">
                                  <input type="number" class="form-control" id="int_mobile_prefix" name="int_mobile_prefix" placeholder="Country Code" style="width:200px;" tabindex="11" value="<?php echo $interaction_data['mobile_prefix']; ?>" readonly></label>
                                  <label class="checkbox-inline">
                                  <input type="number" class="form-control" name="int_mobile_no" id="int_mobile_no" placeholder="Mobile Number" tabindex="12" value="<?php echo $interaction_data['mobile_office_number']; ?>" readonly>
                                  </label>
                                </div>
                </div>  

                <div class="form-group">
                  <label>Company Web page</label>
                  <input type="text" class="form-control" placeholder="" name="int_company_web" id="int_company_web" tabindex="15" value="<?php echo $interaction_data['company_web_page']; ?>" readonly>
                </div> 
                <!-- /.form-group -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <h5>Interaction Details</h5>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"  data-target="#reservationdate" name="interaction_date" id="interaction_date" value="<?php echo date("d-m-Y", strtotime($interaction_data['interaction_date'])); ?>" tabindex="16" readonly/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-md-3"></label>
                      <div class="col-md-9">
                        <label>
                        <input type="checkbox" name="location_interaction" id="location_interaction" tabindex="17" <?php if ($interaction_data['location_interaction']=='on') { echo 'Checked';} ?> disabled>&nbsp;&nbsp;Location Interaction</label>
                        <label>
                        <input type="checkbox" name="phone_interaction" id="phone_interaction" tabindex="18" <?php if ($interaction_data['phone_interaction']=='on') { echo 'Checked';} ?> disabled>&nbsp;&nbsp;Phone Interaction</label>
                        <label>
                      </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-md-3">Attendees (Clientside)*</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="client_attendees" id="client_attendees" tabindex="19" value="<?php echo $interaction_data['attendees_client_side']; ?>" readonly>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-md-3">Attendees (DACPL)*</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="aci_attendees" id="aci_attendees" tabindex="20" value="<?php echo $interaction_data['attendees_agrimin']; ?>" readonly>
                                <span for="aci_attendees" class="help-block"></span>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Purpose Of Meeting*</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="purpose_meeting" id="purpose_meeting"  tabindex="21" value="<?php echo $interaction_data['purpose_of_meeting']; ?>" readonly>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-md-3">Sales Target</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="sales_target" id="sales_target"  tabindex="22" value="<?php echo $interaction_data['sales_target']; ?>" readonly>
                                <span for="aci_attendees" class="help-block"></span>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Specific Issue</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="specific_issue" id="specific_issue"  tabindex="23" value="<?php echo $interaction_data['specific_issue']; ?>" readonly>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Client Complaint</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="client_complaint" id="client_complaint"  tabindex="24" value="<?php echo $interaction_data['client_complant']; ?>" readonly>
                                <span for="aci_attendees" class="help-block"></span>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <h5>Summary Of Items Discussed</h5>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Items Discussed</label>
                              <div class="col-md-12">
                                <textarea class="form-control" rows="3" name="items_discussed" id="items_discussed"  tabindex="25" readonly><?php echo $interaction_data['summary_of_items_discussed']; ?></textarea>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->

              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Summary Of Action Points*</label>
                              <div class="col-md-12">
                                <textarea class="form-control" rows="3" name="action_points" id="action_points"  tabindex="27" readonly><?php echo $interaction_data['summary_of_action_points']; ?></textarea>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->              
            </div>
            <!-- /.row -->            

            <h5>Outlook (DACPL)</h5>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-9">Was the purpose of the meeting achieved?*</label>
                              <div class="col-md-12">
                                <textarea class="form-control" rows="3" name="purpose_acheived" id="purpose_acheived"  tabindex="29" readonly><?php echo $interaction_data['purpose_of_meeting_achieved']; ?></textarea>
                              </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-12">What action to be taken to achieve said purpose/target?*</label>
                              <div class="col-md-12">
                                <textarea class="form-control" rows="3" name="action_acheived" id="action_acheived"   tabindex="31" readonly><?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose']; ?></textarea>
                              </div>                              
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <?php /*<div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="exampleInputFile" class="col-md-3 control-label">Upload...</label>
                                <div class="col-md-12">
                                <input type="file" id='upl_purpose' name="upl_purpose"  tabindex="30">
                                </div>
                                <br>
                                <span>*Only pdf,doc,xls accepted of Size Upto 2MB.</span>
                </div>
                <!-- /.form-group -->
              </div>*/ ?>
              <!-- /.col -->
            </div>
            <!-- /.row -->            

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Followup* (Select No, If Company Has Become DACPL Client, Select Yes To Do Followup)</label>
                    <select class="form-control" name="followup_flag" id="followup_flag" tabindex="5">
                      <option value="">Select</option>
                      <option value="0">No</option>
                      <option value="1">Yes</option> 
                    </select>  
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->

              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <div>&nbsp;</div>
                  <label>Followup Date:</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"  data-target="#reservationdate2" name="followup_date" id="followup_date" value="" tabindex="16" readonly/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->    
            </div>    

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-9">When will Team DACPL follow up with client?</label>
                              <div class="col-md-12">
                                <textarea class="form-control" rows="3" name="aci_followup" id="aci_followup"   tabindex="33"></textarea>
                              </div>                              
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->  
            <h5>Report Generated By</h5>

            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Date of Report Filing</label>
                  <label class="control-label col-sm-6"><?php echo date("d-m-Y H:i:s", strtotime($this->data['report_date'])); ?></label>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label class="control-label col-sm-6">Report Filed By</label>
                  <label class="control-label col-sm-6"><?php echo $this->data['report_user']; ?></label>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


            <button class="btn btn-primary">Submit</button>
          </div>
          <!-- /.card-body -->
          <?php } ?>
        </div>
        <!-- /.card -->
      </form>
        

        

        <div class="row">
          <div class="col-md-6">

            

            

           
                
        
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->