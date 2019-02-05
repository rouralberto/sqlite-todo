<?php require_once 'includes/header.php';
$controller = trim(Flight::get('controller'), '/'); ?>

<div class="page-content inset">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong><i class="fa fa-check-square-o"></i> Todos List</strong>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Todo</th>
                    <th>Category</th>
                    <?php if ($controller === 'todos' || uriSegment(3) > 1) { ?>
                        <th>Status</th>
                    <?php } ?>
                    <th class="tdaction" width="1%">Details</th>
                    <th width="13%">Created</th>
                    <?php if ($controller === 'todos/1') { ?>
                        <th width="13%">Completed On</th>
                    <?php } ?>
                    <th width="15%" class="tdaction">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php echo $todos; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
