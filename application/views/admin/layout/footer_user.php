<!-- jQuery -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ASSETS_PATH; ?>js/adminlte.min.js"></script>
<script>
/*$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      //alert( "Form successful submitted!" );
      $("#loginForm").submit();
    }
  });*/
  $(document).ready(function(){
  $('#userForm').validate({
    rules: {
      emp_fname: {
        required: true
        //email: true,
      },
      emp_lname: {
        required: true
        //email: true,
      },
      emp_code: {
        required: true,
        minlength: 3
        //email: true,
      },
      emp_type: {
        required: true
        //email: true,
      },
      emp_email: {
        required: true,
        email: true
      },
      emp_pass: {
        required: true,
        minlength: 6
      },
      emp_cnfpass: {
        required: true,
        minlength: 6,
        equalTo : "#emp_pass"
      },
      terms: {
        required: false
      },
    },
    messages: {
      emp_fname: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      emp_lname: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      emp_code: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      emp_type: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      emp_email: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      },
      emp_pass: {
        required: "This field is required",
        minlength: "Your password must be at least 6 characters long"
      },
      emp_cnfpass: {
        required: "This field is required",
        minlength: "Your password must be at least 6 characters long"
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
</script>
</body>
</html>