<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Email</title>
</head>
<body>
		<h1>Falemnderit qe u regjistruat</h1>

		<p>
			You need to <a href='{{url("register/confirm/{$user->token}")}}'>confirm your email address.</a>
		</p>
</body>
</html>