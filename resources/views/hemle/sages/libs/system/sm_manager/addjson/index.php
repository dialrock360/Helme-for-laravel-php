<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>How to Add/Append Data to JSON File using PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Add/Append Data to JSON File</h1>
	<div class="row">
		<div class="col-sm-3 col-sm-offset-1">
			<form method="POST" action="add.php">
				<div class="form-group">
					<label>ID</label>
					<input type="text" class="form-control" name="id">
				</div>
				<div class="form-group">
					<label>Firstname</label>
					<input type="text" class="form-control" name="firstname">
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input type="text" class="form-control" name="lastname">
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" name="address">
				</div>
				<div class="form-group">
					<label>Gender</label>
					<input type="text" class="form-control" name="gender">
				</div>
				<button type="submit" class="btn btn-primary" name="add">Add</button>
			</form>
			<?php
				session_start();
				if(isset($_SESSION['message'])){
					?>
					<div class="alert alert-info text-center" style="margin-top:20px;">
						<?php echo $_SESSION['message']; ?>
					</div>
					<?php
					unset($_SESSION['message']);
				}
			?>
			
		</div>
		<div class="col-sm-7">
			<table class="table table-bordered table-striped">
				<thead>
					<th>ID</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Gender</th>
				</thead>
				<tbody>
					<?php
						$data = file_get_contents('members.json');
						$data = json_decode($data);
						foreach($data as $row){
							echo "
								<tr>
									<td>".$row->id."</td>
									<td>".$row->firstname."</td>
									<td>".$row->lastname."</td>
									<td>".$row->address."</td>
									<td>".$row->gender."</td>
								</tr>
							";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>