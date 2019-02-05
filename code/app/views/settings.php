<?php require_once 'includes/header.php'; ?>

<div class="page-content inset">
    <div class="panel panel-default" id="setting_buttons">
        <div class="panel-heading">
            <strong><i class="glyphicon glyphicon-cog"></i> Database</strong>
        </div>
        <div class="panel-body">
            <button rel="hover_popover" type="button" id="backup" class="btn btn-primary">
                <i class="glyphicon glyphicon-upload"></i> Backup Database
            </button>

            <button rel="hover_popover" type="button" id="restore" class="btn btn-success">
                <i class="glyphicon glyphicon-download"></i> Restore Database
            </button>

            <button rel="hover_popover" type="button" id="deleteall" class="btn btn-warning">
                <i class="glyphicon glyphicon-trash" style="color: white;"></i> Delete Todos
            </button>

            <button rel="hover_popover" type="button" id="cleardb" class="btn btn-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> Clear Database
            </button>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
