<?php
	include 'code.php';
	$data = new Users();
	$newData = $data->getUserById($_GET['id']);
	if(isset($_POST['update'])) {
		$user = array(
				'id'   	 => intval($_GET['id']),
				'name' 	 => $_POST['name'],
				'age'  	 => intval($_POST['age']),
				'gender' => $_POST['gender']
			);
		if($data->updateUserById($user)) {
			echo "User successfully Updated";
		} else {
			echo "Oops?! Something went wrong";
		}
	}
	unset($_POST['update']);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<input type="text" name="name" placeholder="Name" value="<?php echo $newData->name; ?>" required=""><br />
		<input type="text" name="age" placeholder="Age" value="<?php echo $newData->age; ?>"><br />
		<select name="gender">
			<option <?php echo $newData->gender == "Male" ? "selected='true'" : ""; ?>>Male</option>
			<option <?php echo $newData->gender == "Female" ? "selected='true'" : ""; ?>>Female</option>
		</select><br />
		<button type="submit" name="update">Update</button>
		<a href='/phptest/saveTodatabase'>Home</a>
	</form>
</body>
</html>