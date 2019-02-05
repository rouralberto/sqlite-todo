</div>
<!-- End Page content -->
</div>

<?php require_once 'modals.php'; ?>

<!-- JavaScript -->
<script src="/assets/js/jquery-1.10.2.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/plugins/select2/select2.min.js"></script>
<script src="/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="/assets/plugins/summernote/summernote.min.js"></script>
<script src="/assets/plugins/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="/assets/plugins/jGrowl/jquery.jgrowl.js"></script>

<script>
  var controller = "<?php echo trim(Flight::get('controller'), '/'); ?>",
    basePath = "/",
    lastSegment = "<?php echo Flight::get('lastSegment'); ?>";
</script>
<script src="/assets/js/custom.js?v=<?php echo time(); ?>"></script>

</body>
</html>
