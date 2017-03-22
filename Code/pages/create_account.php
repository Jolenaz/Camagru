<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer un compte</title>
	<link rel="stylesheet" href="../../css/create_account.css">
</head>
	<body>
		<h1 style="texte-align:center;">Inscrivez-vous:</h1>
		<form method="POST" action="../server/create.php">
			Identifiant: <input  type="text" name="login" maxlength="30" required/>
			<br />
			Mot de passe: <input type="password" name="passwd" required/>
			<br />
			Cofirmation du mot de passe: <input type="password" name="passwd2" required/>
			<br />
			Courriel: <input type="email" name="mail" required/>
			<input type ="submit" value="OK" name="submit" />
            </form>
        <div>
            <form action="connection.php" method ="post"><input type="submit" value="Annuler"></form>
        </div>
	</body>
</html>