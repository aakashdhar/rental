
  </div>
<!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y') ?> <a href="amigosas.com">Amigos Automation Solutions</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript"
     src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyBmBBDd9eIbjruPE9_2A-64kttSbj6amlc&libraries=places">
 </script>
 <script src="dist/js/jquery.placepicker.js" charset="utf-8"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="dist/js/alltables.js" charset="utf-8"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
     <script type="text/javascript">
         $(document).ready(function()
         {
         	$(".placepicker").placepicker();
         });
       </script>
</body>
</html>
