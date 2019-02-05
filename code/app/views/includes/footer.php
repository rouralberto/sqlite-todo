</div>
<!-- End Page content -->
</div>

<?php require_once 'modals.php'; ?>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="/assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="/assets/plugins/jGrowl/jquery.jgrowl.js"></script>
<script>
    var controller = "<?php echo trim( Flight::get( 'controller' ), '/' ); ?>",
        basePath = "/",
        lastSegment = "<?php echo Flight::get( 'lastSegment' ); ?>";
</script>
<script src="/assets/js/custom.js"></script>

</body>
</html>
