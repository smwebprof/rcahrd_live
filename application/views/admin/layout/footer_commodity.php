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
  $('#commodityForm').validate({
    rules: {
      commodity_name: {
        required: true
        //email: true,
      },
      //sub_shortname: {
       //required: true
      //},      
      terms: {
        required: false
      },
    },
    messages: {
      commodity_name: {
        required: "This field is required",
      },
      //sub_shortname: {
        //required: "This field is required",
      //},
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
});
</script>
</body>
</html>