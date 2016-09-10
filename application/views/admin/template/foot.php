<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2015-2016 <a>Deye</a>.</strong> All rights reserved.
</footer>

<div id="mymodal" class="modal fade modal-danger" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline act_del">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
</div><!-- ./wrapper -->

<!-- Morris.js charts -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=base_url('assets/adminlte/plugins/morris/morris.min.js')?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?=base_url('assets/adminlte/plugins/sparkline/jquery.sparkline.min.js')?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?=base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('assets/adminlte/plugins/knob/jquery.knob.js')?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.js')?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?=base_url('assets/adminlte/plugins/datepicker/bootstrap-datepicker.js')?>" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="<?=base_url('assets/adminlte/plugins/slimScroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?=base_url('assets/adminlte/plugins/fastclick/fastclick.min.js')?>'></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/adminlte/dist/js/app.min.js')?>" type="text/javascript"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script>
    $(function(){

        CKEDITOR.replace( 'editor1',
            {
                filebrowserBrowseUrl : '/browser/browse.php?type=Images',
                filebrowserUploadUrl : '/uploader/upload.php?type=Files'
            });
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
        $(".textarea").wysihtml5({
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": true, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": true, //Button to insert an image. Default true,
            "color": true //Button to change color of font
        });
    });
</script>

<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

<!-- AdminLTE for demo purposes
<script src="dist/js/demo.js" type="text/javascript"></script>
-->
</body>
</html>