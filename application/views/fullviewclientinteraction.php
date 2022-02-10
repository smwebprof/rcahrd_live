

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client Interaction Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo BASE_PATH; ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo BASE_PATH; ?>Viewclientinteraction">View Interaction List</a></li>
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

          <div class="card-body">
            <div class="row">
            	<table class="table table-hover table-striped table-bordered">
				<tr>
					<td width="50%">
						<strong>Full Name</strong>
					</td>
					<td>
						<?php echo $interaction_data['full_name']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Job Title</strong>
					</td>
					<td>
						<?php echo $interaction_data['job_title']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Company</strong>
					</td>
					<td>
						<?php echo $interaction_data['client_name']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Office Address</strong>
					</td>
					<td>
						<?php echo $interaction_data['address'].",".$interaction_data['city'].",".$interaction_data['state'].",".$interaction_data['country']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Office Number</strong>
					</td>
					<td>
						<?php echo $interaction_data['country_code']." ".$interaction_data['tel_no']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Mobile Number</strong>
					</td>
					<td>
						<?php echo $interaction_data['country_code']." ".$interaction_data['mobile_office_number']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Email Address</strong>
					</td>
					<td>
						<?php echo $interaction_data['email_address']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Alternate Contact</strong>
					</td>
					<td>
						<?php echo  $interaction_data['alt_prefix']." ".$interaction_data['alternate_contact']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Company Web page</strong>
					</td>
					<td>
						<?php echo $interaction_data['company_web_page']; ?>
					</td>
				</tr>
				</table>              
            </div>
            <!-- /.row -->

            <h5>Interaction Details</h5>
            <div class="row">
              <table class="table table-hover table-striped table-bordered">
				<tr>
					<td width="50%">
						<strong>Date</strong>
					</td>
					<td>
						<?php echo date("d-m-Y", strtotime($interaction_data['interaction_date'])); ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Location Interaction</strong>
					</td>
					<td>
						<?php #echo $interaction_data['location_interaction']; ?>
						<?php if ($interaction_data['location_interaction']=='on') { echo 'Yes';} ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Phone Interaction</strong>
					</td>
					<td>
						<?php #echo $interaction_data['phone_interaction']; ?>
						<?php if ($interaction_data['phone_interaction']=='on') { echo 'Yes';} ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Attendees (Clientside)</strong>
					</td>
				    <td>
						<?php echo $interaction_data['attendees_client_side']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Attendees (DACPL)</strong>
					</td>
					<td>
						 <?php echo $interaction_data['attendees_agrimin']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Purpose Meeting</strong>
					</td>
					<td>
						<?php echo $interaction_data['purpose_of_meeting']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Sales Target</strong>
					</td>
					<td>
						<?php echo $interaction_data['sales_target']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Specific Issue</strong>
					</td>
					<td>
						<?php echo $interaction_data['specific_issue']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<strong>Client Complaint</strong>
					</td>
					<td>
						<?php echo $interaction_data['client_complant']; ?>
					</td>
				</tr>
				</table>
            </div>
            <!-- /.row -->

            <h5>Summary Of Items Discussed</h5>
            <div class="row">
              <table class="table table-hover table-striped table-bordered">
			  <tr>
				<td>
				   <?php echo $interaction_data['summary_of_items_discussed']; ?>
				</td>
			  </tr>
			  <tr>
				<td>
					<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_items_discussed_path']; ?>"><?php echo $interaction_data['summary_of_items_discussed_path']; ?></a>
				</td>
			  </tr>							
			  </table>
            </div>
            <!-- /.row -->

            <h5>Summary Of Action Points</h5>
            <div class="row">
              <table class="table table-hover table-striped table-bordered">
			  <tr>
				<td width="50%">
					<?php echo $interaction_data['summary_of_action_points']; ?>
				</td>
			  </tr>
			  <tr>
				<td>
				 	<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['summary_of_action_points_path']; ?>"><?php echo $interaction_data['summary_of_action_points_path']; ?></a>
				</td>
			  </tr>
			  </table>
            </div>
            <!-- /.row -->

            <h5>Outlook (DACPL)</h5>
            <div class="row">
              <table class="table table-hover table-striped table-bordered">
				<tr>
					<td width="50%">
						<strong>Was the purpose of the meeting achieved?</strong>
				    </td>
					<td>
						<?php echo $interaction_data['purpose_of_meeting_achieved']; ?>
					</td>
					<td>
						<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['purpose_of_meeting_achieved_path']; ?>"><?php echo $interaction_data['purpose_of_meeting_achieved_path']; ?></a>
					</td>
				</tr>
				<tr>
					<td width="50%">
						<strong>What action to be taken to achieve said purpose/target?</strong>
					</td>
					<td>
						<?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose']; ?>
					</td>
					<td>
						<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?>"><?php echo $interaction_data['action_tobe_taken_to_achieve_said_purpose_path']; ?></a>
					</td>
				</tr>
				<tr>
					<td width="50%">
						<strong>When will Team DACPL follow up with client?</strong>
					</td>
					<td>
						<?php echo $interaction_data['team_aci_followup_with_client']; ?>
					</td>
					<td>
						<a href="<?php echo BASE_PATH.'uploads/'.$interaction_data['team_aci_followup_with_client_path']; ?>"><?php echo $interaction_data['team_aci_followup_with_client_path']; ?></a>
					</td>
				</tr>
				</table>
            </div>
            <!-- /.row -->

            <h5>Followup Details</h5>
            <div class="row">
              <table class="table table-hover table-striped table-bordered">
			  <tr>
				<td width="50%">
					<?php if ($interaction_data['followup_flag']==1) { echo 'Yes';} else { echo 'No';}; ?>
				</td>
			  </tr>
			  <tr>
				<td>
				 	<?php if ($interaction_data['followup_date']) { echo date('d-m-Y',strtotime($interaction_data['followup_date'])); }  ?>
				</td>
			  </tr>
			  <tr>
				<td>
				 	<?php echo $interaction_data['followup_text']; ?>
				</td>
			  </tr>
			  </table>
            </div>
            <!-- /.row -->

            <h5>Report Generated By</h5>

            <div class="row">
              <table class="table table-hover table-striped table-bordered">
				<tr>
					<td width="50%">
						<strong>Date of Report Filing  :</strong> <?php echo date("d-m-Y H:i:s", strtotime($this->data['report_date'])); ?>
					</td>  
					<td>
						<strong>Report Filed By  :</strong>  <?php echo $this->data['report_user']; ?>
					</td>
				</tr>						
				</table>
            </div>
            <!-- /.row -->
        	<?php  } ?>

          </div>
          <!-- /.card-body -->

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