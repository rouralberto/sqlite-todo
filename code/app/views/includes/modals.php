<!-- modals start -->
<!-- Modal -->
<div class="modal fade" id="addtodomodal">
    <div class="modal-dialog">
        <form id="addtodoform">
            <div class="modal-content">
                <div class="modal-header label-default">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-check-square-o"></i> <span
                            class="text-white bold">Add Todo Item</span></h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="category" class="control-label">Category</label>
                        <select class="form-control select2"
                                title="Category"
                                name="category"
                                id="category"
                                required>
                            <option value="">Select</option>
                            <?php echo Flight::get('categories_options'); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="todo">Todo Content</label>
                        <input class="form-control"
                               placeholder="Todo Content"
                               title="Todo Content"
                               name="todo"
                               id="todo"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="detail">Todo Details</label>
                        <textarea class="editor form-control" rows="3"
                                  placeholder="Todo Details"
                                  name="detail"
                                  id="detail"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close
                    </button>
                    <button type="submit" id="btnAddTodo" class="btn btn-success"><i class="fa fa-save"></i> Add Todo
                    </button>
                </div>

            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- modals end -->


<!-- modals start -->
<!-- Modal -->
<div class="modal fade" id="updatetodomodal">
    <div class="modal-dialog">
        <form id="updatetodoform">
            <div class="modal-content">
                <div class="modal-header label-default">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-check-square-o"></i> <span
                            class="text-white bold">Update Todo Item</span></h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="category" class="control-label">Category</label>
                        <select class="form-control select2"
                                title="Category"
                                name="category"
                                id="category"
                                required>
                            <option value="">Select</option>
                            <?php echo Flight::get('categories_options'); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="todo">Todo Content</label>
                        <input class="form-control"
                               placeholder="Todo Content"
                               title="Todo Content"
                               name="todo"
                               id="todo"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="detail">Todo Details</label>
                        <textarea class="editor form-control" rows="3"
                                  placeholder="Todo Details"
                                  name="detail"
                                  id="detail"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close
                    </button>
                    <button type="submit" id="btnUpdateTodo" class="btn btn-success"><i class="fa fa-save"></i> Update
                        Todo
                    </button>
                </div>

            </div>
            <!-- /.modal-content -->
            <input type="hidden" id="todoid" value=""/>
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- modals end -->

<!-- delete confirm modal start -->
<div class="modal fade" id="modal-delete-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-check-square-o"></i> <span
                        class="text-white bold">Delete</span></h4>
            </div>
            <div class="modal-body">
                <p class="pull-left" style="margin-right: 10px;"><i
                        class="glyphicon-4x glyphicon glyphicon-question-sign"></i></p>

                <p>You are about to delete, this procedure is irreversible.</p>

                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close
                </button>
                <button type="button" class="btn btnDelete btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- delete confirm modal end -->

<div class="modal fade" id="modal-dbbackup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-default">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="text-white fa fa-upload"></i> <span
                        class="text-white bold">Backup Database</span></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Backup File Name</label>
                    <input type="text" class="form-control" name="name" id="name" required title="Backup File Name"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close
                </button>
                <button type="button" class="btn btnBackup btn-primary"><i class="fa fa-upload"></i> Backup</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-dbrestore">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="text-white fa fa-download"></i> <span
                        class="text-white bold">Restore Database</span></h4>
            </div>
            <div class="modal-body">
                <?php echo $backups; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close
                </button>
                <button type="button" class="btn btnRestore btn-success"><i class="fa fa-download"></i> Restore</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-dellalltodos-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-warning">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-trash-o"></i> <span
                        class="text-white bold">Delete All Todos</span></h4>
            </div>
            <div class="modal-body">
                <p class="pull-left" style="margin-right: 10px;"><i
                        class="glyphicon-4x glyphicon glyphicon-question-sign"></i></p>

                <p>You are about to delete all todos, this procedure is irreversible.</p>

                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close
                </button>
                <button type="button" class="btn btnDeleteAllTodos btn-warning"><i class="fa fa-trash-o"></i> Delete All
                    Todos
                </button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-cleardb-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-warning-sign"></i> <span
                        class="text-white bold">Clear Database</span></h4>
            </div>
            <div class="modal-body">
                <p class="pull-left" style="margin-right: 10px;"><i
                        class="glyphicon-4x glyphicon glyphicon-question-sign"></i></p>

                <p>You are about to clear database, this procedure is irreversible.</p>

                <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close
                </button>
                <button type="button" class="btn btnClearDB btn-danger"><i class="glyphicon glyphicon-warning-sign"></i>
                    Clear Database
                </button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-success">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-info-sign"></i> <span
                        class="text-white bold">Todo Details</span></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close
                </button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
