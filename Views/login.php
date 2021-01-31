<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--- Bootstrap --->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
	<title>Login | Controle de estoque</title>
	<!-- Icone da pagina -->
	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/assets/images/icon-logo.png" type="image/gx-png" width="32" height="32">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<img class="mb-4" src="<?php echo BASE_URL; ?>/assets/images/logo.png" width="64" height="64">
		</div>
		<div class="row justify-content-center">
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		</div>
		<div class="row justify-content-center">
			<div class="col-3">
				<form method="POST" action="<?php echo BASE_URL; ?>/login/index" class="form-signin">

					<label for="inputUser" class="sr-only">User</label>
					  	<input type="text" name="user" id="inputEmail" class="form-control" placeholder="User" required autofocus><br/>
					<label for="inputPassword" name="password" class="sr-only">Password</label>
					  	<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br/>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
			</div>
		</div>
		<div class="row justify-content-center">
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
		</div>
	</div>

	<!---Jquery--->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.5.1.min.js"></script>
	<!---JS--->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>