
<!-- jQuery -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo ASSETS_PATH; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo ASSETS_PATH; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo ASSETS_PATH; ?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<!-- jquery-validation -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ASSETS_PATH; ?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('#reservationdate2').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })


  $(document).ready(function(){
  $('#newinteractionForm').validate({
    rules: {
      int_company: {
        required: true
        //email: true,
      },
      int_full_name: {
        required: true
        //email: true,
      },
      int_office_address: {
        required: true
      },
      company_country: {
        required: true
      },
      company_state: {
        required: true
      },
      company_city: {
        required: true
      },
      int_office_prefix: {
        required: true
        //email: true,
      },
      int_office_no: {
        required: true
        //email: true,
      },
      int_mobile_prefix: {
        required: true
        //email: true,
      },
      int_mobile_no: {
        required: true
        //email: true,
      },
      int_email_address: {
        required: true,
        email: true
      },
      client_attendees: {
        required: true
        //email: true,
      },
      aci_attendees: {
        required: true
        //email: true,
      },
      purpose_meeting: {
        required: true
        //email: true,
      },
      actions_discussed: {
        required: true
        //email: true,
      },
      purpose_acheived: {
        required: true
        //email: true,
      },
      purpose_action: {
        required: true
        //email: true,
      },
      action_points: {
        required: true
        //email: true,
      },
      action_acheived: {
        required: true
        //email: true,
      },
      followup_flag: {
        required: true
        //email: true,
      },
      aci_followup: {
        required: false
        //email: true,
      },
      terms: {
        required: false
      },
    },
    messages: {
      int_company: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      int_full_name: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      int_office_address: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      company_country: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      company_state: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      company_city: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      int_office_prefix: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      int_office_no: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      int_email_address: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      int_mobile_prefix: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      int_mobile_no: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      client_attendees: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      aci_attendees: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      purpose_meeting: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      actions_discussed: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      purpose_acheived: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      purpose_action: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      action_points: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      action_acheived: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      followup_flag: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      aci_followup: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    },
    submitHandler: function (form) {
      form.submit(); // form validation success, call ajax form submit
    }
  });
});


$('#company_country').change(function(){
            var comp_id = $('#company_country').val();
            //alert(comp_id);
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>newclientinteraction/fetch_states',
               'type': 'post',
               'data' : { country_id : comp_id},
               'success' : function(data)
               {
                 // alert(data);
                 $('#company_state').html(data);
               } 
               });
             } 
   
              // fetch_countrycode for adduseremployeedetails page
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>newclientinteraction/fetch_countrycode',
               'type': 'post',
               'data' : { country_id : comp_id},
               'success' : function(data)
               {
                 $('#country_code').html(data);
               } 
               });
             } 

             // fetch_countrycode for addclientmaster page
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>newclientinteraction/fetch_phonecode',
               'type': 'post',
               'data' : { country_id : comp_id},
               'success' : function(data)
               {
                 //alert(data);
                 $('#int_office_prefix').val(data);
                 $('#int_mobile_prefix').val(data);
               } 
               });
             } 

        });

$('#company_state').change(function(){
            var state_id = $('#company_state').val();
            
             if(state_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>newclientinteraction/fetch_city',
               'type': 'post',
               'data' : { state_id : state_id},
               'success' : function(data)
               {
                 
                 $('#company_city').html(data);
               } 
               });
             } 
        });


$('#int_company').change(function(){
             var comp_id = $('#int_company').val();
             //alert(comp_id);
             if(comp_id != '')
             {
               $.ajax({
               'url' : '<?php echo BASE_PATH; ?>Addclientinteraction/fetch_clientdata',
               'type': 'post',
               'data' : { id : comp_id},
               'success' : function(data)
               {
                 //alert(data);
                 res = data.split("|");
                 //alert(res);
                 $('#int_office_address').val(res[0]);
                 $('#int_office_no').val(res[1]);
                 $('#int_company_web').val(res[2]);
                 $('#country_name').val(res[3]);
                 $('#state_name').val(res[4]);
                 $('#city_name').val(res[5]);
                 $('#company_country').val(res[6]);
                 $('#company_state').val(res[7]);
                 $('#company_city').val(res[8]);
                 $('#int_office_prefix').val(res[9]);
                 $('#int_mobile_prefix').val(res[9]);
                 $('#int_alt_prefix').val(res[9]);
                 $('#int_email_address').val(res[10]);
               } 
               });
             } 
        });                  
  
  // DropzoneJS Demo Code End
</script>
</body>
</html>