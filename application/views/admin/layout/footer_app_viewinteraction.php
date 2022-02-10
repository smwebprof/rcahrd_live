<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="http://rcaindia.com/" target="_blank">RCAINDIA</a>.</strong>
    All rights reserved.
    <!--<div class="float-right d-none d-sm-inline-block">
      Project Managed By Shivaji Dalvi
    </div>-->
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

<!-- DataTables  & Plugins -->
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- InputMask -->
<script src="<?php echo ASSETS_PATH; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/inputmask/jquery.inputmask.min.js"></script>

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
<script src="<?php echo ASSETS_PATH; ?>js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ASSETS_PATH; ?>js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ASSETS_PATH; ?>js/pages/dashboard.js"></script>

<!-- Page specific script -->

<script>
  $(function () {
    //Date picker
    $('#reservationdate').datetimepicker({
        //format: 'L'
        format: 'DD/MM/YYYY'
    });

    $('#reservationdate2').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('#reservationdate3').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('#reservationdate4').datetimepicker({
        format: 'DD/MM/YYYY'
    });
  })
</script>

<script>
  $(function () {
    $("#dashboardfrm").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#dashboardfrm_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
