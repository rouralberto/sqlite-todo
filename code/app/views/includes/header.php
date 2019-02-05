<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="/assets/plugins/jGrowl/jquery.jgrowl.css" rel="stylesheet">
	<link href="/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
	<link href="/assets/css/custom.css" rel="stylesheet">
	<link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAc/8AAAAAAABaxwAAX9QA////AABl4AAAbPAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEQAAAAAAAAEEUAAAAACIkERQiIgACIkEREUIiIDM0FEQRQzMzMzNDM0EUMzNVVVVVVBRVVVVVVVVVQUVVZmZmZmZkFGZmZmZmZmZGZgAAAAAAAAAAEAAAAAAAAAGAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAAQAA" rel="icon" type="image/x-icon"/>
</head>

<body>
<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand"><a href="/"><i class="fa fa-check-square-o"></i> sqlite-todo</a></li>
			<li><a href="/">Dashboard</a></li>
			<li><a href="/todos/0">Pending</a></li>
			<li><a href="/todos/1">Completed</a></li>
			<li><a href="/todos">All Todos</a></li>
			<li><a href="/categories">Categories</a></li>
			<li><a href="/settings">Settings</a></li>
		</ul>
	</div>
	<!-- End Sidebar -->

	<!-- Page content -->
	<div id="page-content-wrapper">

		<div class="content-header">
			<div class="pull-left">
				<h2><i class="glyphicon <?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
			</div>
			<div class="pull-right" id="addbuttoncontainer">
				<button class="btn btn-success" data-toggle="modal" data-target="#addtodomodal">
					<i class="fa fa-plus-circle"></i> Add Todo Item
				</button>
			</div>
			<div class="clearfix"></div>
		</div>

		<?php if ( getFlashMessage() ) {
			$class = ( false !== stripos( getFlashMessage(), 'error' ) ) ? 'danger' : 'success';
			$icon  = ( $class === 'danger' ) ? 'warning' : 'check-circle'; ?>
			<div class="bold alert alert-<?php echo $class; ?>">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<i class="fa fa-<?php echo $icon; ?>"></i> <?php echo getFlashMessage();
				clearFlashMessage(); ?>
			</div>
		<?php } ?>
