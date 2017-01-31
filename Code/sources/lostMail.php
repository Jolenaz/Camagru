
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

	</head>
	<body>
		<h1 style="texte-align:center;">Recevoir un nouveau mot de passe par email.</h1>
		<section >
			<form method="POST" action="sendMail.php">
                Courriel: <input type="email" name="mail" required/>
                <input type ="submit" value="OK" name="submit" />
			</form>
		</section>
	</body>
</html>