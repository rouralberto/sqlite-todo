<?php require_once 'includes/header.php'; ?>

    <div class="page-content inset">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong><i class="fa fa-folder"></i> Manage Categories</strong>
                    </div>
                    <!-- .panel-heading -->
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-plus-circle"></i> <a class="smallnounderline"
                                                                             data-toggle="collapse"
                                                                             data-parent="#accordion"
                                                                             href="#new">Add New Category</a>
                                    </h4>
                                </div>
                                <div id="new" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <form action="categories" method="post">
                                            <div class="form-group">
                                                <label for="category">Category Name</label>
                                                <input class="form-control"
                                                       placeholder="Category Name"
                                                       title="Category Name"
                                                       name="category"
                                                       id="category"
                                                       required>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                                    Add Category
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-folder"></i> <a class="smallnounderline" data-toggle="collapse"
                                                                        data-parent="#accordion"
                                                                        href="#existing">Existing Categories</a>
                                    </h4>
                                </div>
                                <div id="existing" class="panel-collapse collapse in">
                                    <div class="panel-body">

                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category Name</th>
                                                <th>Total Todos</th>
                                                <th class="tdaction">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php echo $categories; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .panel-body -->
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>