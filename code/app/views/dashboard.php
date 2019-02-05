<?php require_once 'includes/header.php'; ?>

<div class="page-content inset">
    <div class="alert alert-info">
        You have <strong><?php echo $totalActive; ?></strong> pending tasks
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong><i class="fa fa-check-square-o"></i> Latest Active Todos</strong>
        </div>
        <div class="panel-body">
            <table class="nodatatable table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th width="25">#</th>
                    <th>Todo</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                <?php echo $todos; ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <i class="fa fa-chevron-circle-right"></i> <a href="/todos/0">See All</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
