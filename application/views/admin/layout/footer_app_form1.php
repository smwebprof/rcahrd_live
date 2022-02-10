<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="http://rcaindia.com/" target="_blank">RCAINDIA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Project Managed By </b> Shivaji Dalvi
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo ASSETS_PATH; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ASSETS_PATH; ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo ASSETS_PATH; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ASSETS_PATH; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo ASSETS_PATH; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo ASSETS_PATH; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ASSETS_PATH; ?>js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ASSETS_PATH; ?>js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ASSETS_PATH; ?>js/<?php echo ASSETS_PATH; ?>pages/dashboard.js"></script>
<script>
/*$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      //alert( "Form successful submitted!" );
      $("#selfForm").submit();
    }
  });*/
  $(document).ready(function(){
  $('#selfForm').validate({
    rules: {
      self_que_1: {
        required: true
        //minlength: 4
        //email: true,
      },
      self_que_2: {
        required: true
        //minlength: 4
      },
      self_que_3: {
        required: true
        //minlength: 4
      },
      self_que_4: {
        required: true
        //minlength: 4
      },
      self_que_5: {
        required: true
        //minlength: 4
      },
      self_que_6: {
        required: true
        //minlength: 4
      },
      self_que_7: {
        required: true
        //minlength: 4
      },
      self_que_8: {
        required: true
        //minlength: 4
      },
      self_que_8a: {
        required: true
        //minlength: 4
      },
      self_que_8b: {
        required: true
        //minlength: 4
      },
      self_que_8c: {
        required: true
        //minlength: 4
      },
      self_que_8d: {
        required: true
        //minlength: 4
      },
      self_que_8e: {
        required: true
        //minlength: 4
      },
      self_que_8f: {
        required: true
        //minlength: 4
      },
      self_que_8g: {
        required: true
        //minlength: 4
      },
      self_que_8h: {
        required: true
        //minlength: 4
      },
      self_que_8i: {
        required: true
        //minlength: 4
      },
      self_que_8j: {
        required: true
        //minlength: 4
      },
      self_que_8k: {
        required: true
        //minlength: 4
      },
      self_que_8l: {
        required: true
        //minlength: 4
      },
      self_que_8m: {
        required: true
        //minlength: 4
      },
      self_que_8n: {
        required: true
        //minlength: 4
      },
      self_que_8o: {
        required: true
        //minlength: 4
      },
      self_que_8p: {
        required: true
        //minlength: 4
      },
      self_que_8q: {
        required: true
        //minlength: 4
      },
      self_que_9: {
        required: true
        //minlength: 4
      },
      self_que_10: {
        required: true
        //minlength: 4
      },
      self_que_11: {
        required: true
        //minlength: 4
      },
      self_que_12: {
        required: true
        //minlength: 4
      },
      terms: {
        required: false
      },
    },
    messages: {
      self_que_1: {
        required: "This field is required"
        //email: "Please enter a vaild email address"
      },
      self_que_2: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_3: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_4: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_5: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_6: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_7: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_8: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_9: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_10: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_11: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
      },
      self_que_12: {
        required: "This field is required"
        //minlength: "Your password must be at least 4 characters long"
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

$('#save_btn').click(function(e){
  e.preventDefault();

  var form = $('#selfForm');
  var url = form.attr('action');
  document.getElementById("status").value='Inprogress';
  //alert(form.serialize());
  $.ajax({ 
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               //alert(data); // show response from the php script.
               alert('Assesment Form is Saved!!!');
           }
         });
  //alert('Form Details Saved!!!');
});


</script>
</body>
</html>
