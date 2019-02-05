/**
 * Created by SARFRAZ on 1/18/14.
 */

// select active navigation item
$('.sidebar-nav a').parents('li').removeClass('activelink');

if (controller === 'dashboard' || controller === 'home') {
    $('.sidebar-nav a:contains("Dashboard")').parents('li').addClass('activelink');
}
else if (controller === 'todos/0') {
    $('.sidebar-nav a:contains("Pending")').parents('li').addClass('activelink');
}
else if (controller === 'todos/1') {
    $('.sidebar-nav a:contains("Completed")').parents('li').addClass('activelink');
}
else if (controller === 'todos') {
    $('.sidebar-nav a:contains("All Todos")').parents('li').addClass('activelink');
}
else if (controller === 'categories') {
    $('.sidebar-nav a:contains("Categories")').parents('li').addClass('activelink');
}
else if (controller.match("todos/[0-9]+")) {
    $('.sidebar-nav a:contains("Categories")').parents('li').addClass('activelink');
}
else if (controller === 'settings') {
    $('.sidebar-nav a:contains("Settings")').parents('li').addClass('activelink');
}

// style tables
$('.page-content table').not('table.nodatatable').dataTable({
    "sPaginationType": "full_numbers",
    "bAutoWidth": true,
    "bLengthChange": false,
    "iDisplayLength": 25
});

// replace selects with select2
$('select').select2({ placeholder: 'Choose' });

// wysiwig for bootstrap
$('.editor').summernote({
    height: 100,
    focus: true,
    toolbar: [
        //['style', ['style']], // no style button
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['picture', 'link']], // no insert buttons
        //['table', ['table']], // no table button
        ['help', ['help']] //no help button
    ]
});

// confirm modal
$('body').on('click', '.confirm-delete', function (e) {
    var id = $(this).data('id');
    var page = $(this).data('page');
    var label = $(this).data('label');
    var $lastTR = $(this).closest('tr');

    $('#modal-delete-confirm').find('h3').html('<i class="icon-trash"></i> Delete ' + label);
    $('#modal-delete-confirm').find('.modal-body p:eq(1)').html('You are about to delete <strong>' + label + '</strong>, this procedure is irreversible.');
    $('#modal-delete-confirm').find('.dialogdelete').attr('href', this.href);
    $('#modal-delete-confirm').data('id', id).modal('show');
    $('#modal-delete-confirm').data('page', page).modal('show');
    $('#modal-delete-confirm').data('tr', $lastTR).modal('show');

    e.preventDefault();
});

$('.modal-footer .btnDelete').click(function () {
    var id = $(this).closest('#modal-delete-confirm').data('id');
    var page = $(this).closest('#modal-delete-confirm').data('page');
    var $lastTR = $(this).closest('#modal-delete-confirm').data('tr');

    $.post(basePath + 'delete', {"id": id, "page": page}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Delete Notification' });

        if (response.indexOf('Error') < 0) {
            $lastTR.slideUp('slow');
        }
    });

    $(this).closest('#modal-delete-confirm').modal('hide');
});

// for tooltips
$(".tip").tooltip();

// inline bootstrap editable
$.fn.editable.defaults.mode = 'popup';

$('a.editable').editable({
    validate: function (value) {
        if ($.trim(value) == '') return 'Cannot be empty!';
    }
});

$('a.editable').editable();

// add todoitem
$('#btnAddTodo').click(function () {
    var category = $(this).closest('#addtodomodal').find('#category').val();
    if (!category) {
        $.jGrowl('Please choose a category first!', { sticky: false, header: 'Error' });
        return false;
    }
});

$('#addtodoform').submit(function () {
    var category = $(this).closest('#addtodomodal').find('#category').val();
    var todo = $(this).closest('#addtodomodal').find('#todo').val();
    var detail = $(this).closest('#addtodomodal').find('#detail').code();
    var $this = $(this);

    $.post(basePath + 'addtodo', {"category": category, "todo": todo, "detail": detail}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Add Todo Notification' });

        if (response.indexOf('Error') < 0) {
            $this.closest('#addtodomodal').find('form')[0].reset();
            $this.closest('#addtodomodal').find('#category').select2();
            $this.closest('#addtodomodal').find('#detail').code('');
        }

    });

    $(this).closest('#addtodomodal').modal('hide');

    // do not submit/reload form
    return false;
});

// mark to do completed or active
$('.todo-process').click(function () {
    var id = $(this).data('id');
    var $tr = $(this).closest('tr');
    var $this = $(this);
    var action = basePath + 'active';
    var isActive = false;

    if ($(this).find('i.glyphicon-ok').length) {
        action = basePath + 'completed';
        isActive = true;
    }

    $.post(action, {"id": id}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Todo Status Notification' });

        if (response.indexOf('Error') < 0) {
            if (controller !== 'todos' && lastSegment <= 1) {
                $tr.slideUp('slow');
            }
            else {
                if (isActive) {
                    $tr.find('td.tdstatus span').removeClass('label-primary').addClass('label-success');
                    $tr.find('td.tdstatus span').text('Completed');
                    $this.find('i').removeClass('glyphicon-ok').addClass('glyphicon-repeat');
                    $tr.addClass('success');
                }
                else {
                    $tr.find('td.tdstatus span').removeClass('label-success').addClass('label-primary');
                    $tr.find('td.tdstatus span').text('Active');
                    $this.find('i').removeClass('glyphicon-repeat').addClass('glyphicon-ok');
                    $tr.removeClass('success');
                }
            }
        }
    });
});

// show edit todoitem modal
var $updateTr = null;
var todoId = null;
$('a.edit-todo').click(function () {
    var todo = $(this).closest('tr').find('td.tdtodo').text();
    var category = $(this).closest('tr').find('td.tdcategory').data('cid');
    var detail = $(this).closest('tr').find('td.tddetail').find('span[rel="popover"]').next('span').html();
    var $updateModal = $('form#updatetodoform');
    $updateTr = $(this).closest('tr');
    todoId = $(this).data('id');

    $updateModal.find('#category').select2().select2("val", category);
    $updateModal.find('#todo').val(todo);
    $updateModal.find('#detail').code(detail);

    $updateModal.closest('#updatetodomodal').modal('show');
});

// update todoitem
$('#btnUpdateTodo').click(function () {
    var category = $(this).closest('#updatetodomodal').find('#category').val();
    if (!category) {
        $.jGrowl('Please choose a category first!', { sticky: false, header: 'Error' });
        return false;
    }
});

$('#updatetodoform').submit(function () {
    var category = $(this).closest('#updatetodomodal').find('#category').val();
    var categoryName = $(this).closest('#updatetodomodal').find('#category option:selected').text();
    var todo = $(this).closest('#updatetodomodal').find('#todo').val();
    var detail = $(this).closest('#updatetodomodal').find('#detail').code();

    $.post(basePath + 'updatetodo', {"id": todoId, "category": category, "todo": todo, "detail": detail}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Update Todo Notification' });

        if (response.indexOf('Error') < 0) {
            var categoryPath = basePath + 'todos/' + category;

            $updateTr.find('td.tdtodo').text(todo);
            $updateTr.find('td.tdcategory').html('<a href="' + categoryPath + '">' + categoryName + '</a>');
            $updateTr.find('td.tddetail').find('span[rel="popover"]').next('span').html(detail);

            $('#updatetodomodal').modal('hide');
        }

    });

    // do not submit/reload form
    return false;
});

$('[rel=hover_popover]').popover({ "trigger": "hover", "placement": "right"});

$('#backup').click(function () {
    $('#modal-dbbackup').modal('show');
});

$('#restore').click(function () {
    $('#modal-dbrestore').modal('show');
});

$('#deleteall').click(function () {
    $('#modal-dellalltodos-confirm').modal('show');
});

$('#cleardb').click(function () {
    $('#modal-cleardb-confirm').modal('show');
});

$('.btnBackup').click(function () {
    var name = $(this).closest('#modal-dbbackup').find('#name').val();

    if (!name) {
        $.jGrowl('Please enter backup filename first!', { sticky: false, header: 'Error' });
        return false;
    }

    $.post(basePath + 'backup', {"name": name}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Backup Database Notification' });
    });

    $('#modal-dbbackup').modal('hide');

});

$('.btnRestore').click(function () {
    var name = $('#modal-dbrestore').find('.dbbackup:checked').val();

    if (!name) {
        $.jGrowl('Please select backup file first!', { sticky: false, header: 'Error' });
        return false;
    }

    $.post(basePath + 'restore', {"name": name}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Restore Database Notification' });
    });

    $('#modal-dbrestore').modal('hide');
});

// delete all todos
$('.btnDeleteAllTodos').click(function () {
    $.post(basePath + 'deletealltodos', {}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Delete All Todos Notification' });
    });

    $('#modal-dellalltodos-confirm').modal('hide');
});

// clear whole database
$('.btnClearDB').click(function () {
    $.post(basePath + 'cleardb', {}, function (response) {
        $.jGrowl(response, { sticky: false, header: 'Clear Database Notification' });
    });

    $('#modal-cleardb-confirm').modal('hide');
});

// view todoitem details
$('span[rel="popover"]').click(function () {
    var details = $(this).next('span').html();
    $('#modal-detail').find('div.modal-body').html(details);
    $('#modal-detail').modal('show');
});
