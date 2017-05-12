<!DOCTYPE html>
<html>
<head>
	<title>Verifikimi email-it</title>
</head>
<body>
		<h1>Falemnderit qe u regjistruat</h1>

		<p>
			Ju lutem <a href='{{url("register/confirm/{$user->token}")}}'>konfirmoni emailin tuaj.</a>
		</p>
</body>
</html>