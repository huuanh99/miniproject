<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/note.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>NOTE</h2>
						</div>
						<div class="col-sm-6">
							<a href="index.php?action=logout" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Logout</span></a>
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Note</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Nội dung</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$stt = 0;
						if ($notes) {
							while ($result = $notes->fetch_assoc()) {
						?>
								<tr>
									<td><?php echo ++$stt ?></td>
									<td><?php echo $result['content'] ?></td>
									<td>
										<a href="index.php?controller=note&action=edit&id=<?php echo $result['id'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
										<a onclick="return confirm('Do you want to delete?')" href="index.php?controller=note&delId=<?php echo $result['id'] ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
									</td>
								</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="index.php?controller=note">
					<div class="modal-header">
						<h4 class="modal-title">Add Note</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nội dung</label>
							<input type="text" name="content" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add" name="addnote">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->


</body>

</html>