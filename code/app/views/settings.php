<?php require_once 'includes/header.php'; ?>

<div class="page-content inset">
    <div class="row">
        <div class="panel panel-primary" id="setting_buttons">
            <div class="panel-heading">
                <strong><i class="glyphicon glyphicon-cog"></i> Settings</strong>
            </div>
            <div class="panel-body">
                <button rel="hover_popover" data-content="Backup entire todos database" type="button" id="backup"
                        class="btn btn-primary"><i class="glyphicon glyphicon-upload"></i> Backup Database
                </button>
                <br/>

                <button rel="hover_popover"
                        data-content="Restore previously saved database"
                        type="button" id="restore" class="btn btn-success"><i class="glyphicon glyphicon-download"></i> Restore
                    Database
                </button>
                <br/>

                <button rel="hover_popover" data-content="Delete all todos but keep categories" type="button" id="deleteall"
                        class="btn btn-warning"><i class="glyphicon glyphicon-trash" style="color:white;"></i> Delete All Todos
                </button>
                <br/>

                <button rel="hover_popover" data-content="Remove all todos along with categories to clear up everything"
                        type="button" id="cleardb" class="btn btn-danger"><i class="glyphicon glyphicon-warning-sign"></i> Clear
                    Todos Database
                </button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
