<?php
	require 'conexion.php';

	$message = '';

	if (!empty($_POST['users_email']) && !empty($_POST['users_password'])) {
		$sql = "INSERT INTO users (users_email, users_password) VALUES (:users_email, :users_password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':users_email',$_POST['users_email']);
		$password = password_hash($_POST['users_password'], PASSWORD_BCRYPT);
		$stmt->bindParam(':users_password',$password);

		if ($stmt->execute()) {
			$message = 'Successfully created new user';
		} else {
			$message = 'Sorry there must have been an issue creating your account';
		}
	}
?>