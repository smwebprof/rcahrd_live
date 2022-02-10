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
  $('#commoditylinkForm').validate({
    rules: {
      link_client: {
        required: true,
      },
      link_email: {
        required: true,
        email: true
      },
      terms: {
        required: false
      },
    },
    messages: {     
      link_client: {
        required: "This field is required",
        //email: "Please enter a vaild email address"
      }, 
      link_email: {
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
</script>
</body>
</html>