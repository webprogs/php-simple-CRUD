<!DOCTYPE html>
<?php 
		include('code.php'); 
		$user = new Users();
	?>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1" cellpadding="10">
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<!-- extract object -->
			<?php foreach($user->getData() as $users){ ?>
				<tr>
					<td><?php echo $users->name; ?></td>
					<td><?php echo $users->age; ?></td>
					<td><?php echo $users->gender; ?></td>
					<td><a href="update.php?id=<?php echo $users->id; ?>">Update</a></td>
					<td><a href="delete.php?id=<?php echo $users->id; ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5">
					<a href="register.php">Register</a>
				</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>