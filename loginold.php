<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<h3> Login Form </h3>

	<form method="POST" name="register" action="processlogin.php">
	<label for="Username">Username</label>
	<input type="text" name="username" required>
	<br>
	<label for="Password">Password</label>
	<input type="text" name="password" required>
	<br>
	<button type="submit" value="LOGIN" name="LOGIN">Login
	</button>
	<div>Havent Registered... <a href="register.php">Register Here!!!</a></div>
	
	</form>
</body>
</html>