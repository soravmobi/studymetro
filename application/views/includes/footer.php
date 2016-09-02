		<footer class="main-footer">
			<strong>
				Copyright &copy; <?php echo date('Y'); ?> 
				<a href="<?php echo base_url(); ?>" target="_blank">
					<?php echo get_option('site_name'); ?>
				</a>.
			</strong> All rights reserved.
		</footer>
	</div><!-- ./wrapper -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
      $(function () {
        $(".colorpicker").colorpicker();

      });
      function base_url()
      {
         site_url = '<?php echo base_url(); ?>';
         return site_url;
      }
    </script>
    <script src="<?php admin_assets(); ?>js/chosen.jquery.js"></script>
    <script src="<?php admin_assets(); ?>js/dropzone.js"></script>
    <!-- Nestable js -->
    <script src="<?php admin_assets(); ?>js/jquery.nestable.js"></script>
    <!-- Custom js -->
    <script src="<?php admin_assets(); ?>js/custom.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php admin_assets(); ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?php admin_assets(); ?>plugins/select2/select2.full.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php admin_assets(); ?>js/raphael-min.js"></script>
    <script src="<?php admin_assets(); ?>plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php admin_assets(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php admin_assets(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php admin_assets(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php admin_assets(); ?>plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="<?php admin_assets(); ?>js/moment.min.js"></script>
    <script src="<?php admin_assets(); ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php admin_assets(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php admin_assets(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php admin_assets(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php admin_assets(); ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php admin_assets(); ?>dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php admin_assets(); ?>dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php admin_assets(); ?>dist/js/demo.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php admin_assets(); ?>plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php admin_assets(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
  </body>
</html>