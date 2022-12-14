<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
	<title>Log In</title>
	<style type="text/css">
		h2 {
			text-align: center;
			margin-top: 35vh;
		}
		.login {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 35vh;

		}

		@media all and (min-width: 600px) {
			.login {
				justify-content: center;
				flex-direction: row;
				align-items: center;
			}
		}
	</style>
</head>

<body>
	<div class="container">
		<h2>Login</h2>
		<div class="login">
			<input type="text" id="username" name="username" placeholder="Username">&nbsp;&nbsp;&nbsp;
			<input type="password" id="password" name="password" placeholder="Password">&nbsp;&nbsp;&nbsp;
			<input id="submit" type="submit" value="Log-in">
		</div>
	</div>
	<script type="text/javascript">
		$('body').on('click', '#submit', function() {
			var username = $('#username').val();
			var password = $('#password').val();
			$.post('login_proses.php', {
				username: username,
				password: password,
			}).done(function(data) {
				if (data == 'Berhasil') {
					alert('Log In Berhasil!');
					window.location.href = 'index.php'; 
				} else {
					alert('Username/Password Salah!');
				}
			});
		});
	</script>
</body>

</html>