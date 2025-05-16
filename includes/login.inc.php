<?php

session_start();
require_once 'connection.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = trim($_POST['email']);
	$password = $_POST['password'];

	$query = "SELECT username, password FROM users WHERE email = ?";
	$stmt = mysqli_prepare($con, $query);
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($result)) {
		if (password_verify($password, $row['password'])) {
			$_SESSION['name'] = $row['username'];
			mysqli_stmt_close($stmt);
			mysqli_close($con);
			header('Location: ../index.php');
			exit;
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($con);
	header('Location: ../login.php?error=invalid_credentials');
	exit;
}
