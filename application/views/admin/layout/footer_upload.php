<!-- jQuery -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ASSETS_PATH; ?>js/adminlte.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
/*$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      //alert( "Form successful submitted!" );
      $("#loginForm").submit();
    }
  });*/
  $(document).ready(function(){
  $('#uploadForm').validate({
    rules: {
      commodity_file: {
        required: true
        //email: true,
      },
      commodity: {
        required: true
      },
      commodity_type: {
        required: true
      },      
      terms: {
        required: false
      },
    },
    messages: {
      commodity_file: {
        required: "This field is required",
      },
      commodity: {
        required: "This field is required",
      },
      commodity_type: {
        required: "This field is required",
      },
      emp_lname: {
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


  $('#commodity').change(function(){
    var commodity = $('#commodity').val();
    
    if(commodity != '')
    {
        $.ajax({
        'url' : '<?php echo BASE_PATH; ?>Uploadpresentation/fetch_commodity',
        'type': 'post',
        'data' : { commodity : commodity},
        'success' : function(data)
        {
          //alert(data);
          $('#commodity_type').html(data);
        } 
        });
    }          
  });


});
</script>
</body>
</html>