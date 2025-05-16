<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
	<style>
		hr {
			margin: 3rem 0;
			height: 1px;
			border: none;
			background: linear-gradient(to right, transparent, rgb(34, 34, 34), transparent);
		}
	</style>
</head>

<body>
	<main>
		<div class="container-md d-flex justify-content-center align-items-center min-vh-100">
			<div class="w-100" style="max-width: 400px;">
				<h1 class="text-center m-3">Login</h1>
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'invalid_credentials') {
						echo "<div class='alert alert-danger'>Invalid email or password.</div>";
					}
				}
				?>
				<form name="loginfrm" action="includes/login.inc.php" method="POST">
					<div class="mb-3">
						<label for="email">Email Address</label>
						<input type="email" name="email" id="email" class="form-control p-1" size="32" autocomplete="email" required>
					</div>
					<div class="mb-3">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control p-1" size="32" autocomplete="current-password" required>
					</div>
					<button type="submit" class="btn btn-primary w-100">Submit</button>
				</form>
				<hr>
				<div class="text-center">
					<p>Don't have an account? <a href="register.php">Register</a></p>
				</div>
			</div>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>