<?php

require_once 'connection.inc.php';

$query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($con, $query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['name'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $password);
	mysqli_stmt_execute($stmt);

	if (mysqli_stmt_affected_rows($stmt) > 0) {
		session_start();
		$_SESSION['name'] = $username;
		header('Location: ../index.php');
		exit;
	} else {
		echo "Error: " . mysqli_error($con);
	}
}
mysqli_stmt_close($stmt);
mysqli_close($con);
