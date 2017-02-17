
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon compte</title>
	<link rel="stylesheet" href="../../css/create_account.css">
</head>
	<body>
		<form method="POST" action="../scripts/modify_p.php">
			Ancien mot de passe: <input  type="password" name="old_passwd" required/>
		<br />
			Nouveau mot de passe: <input type="password" name="passwd" required/>
		<br />
			Cofirmation du mot de passe: <input type="password" name="passwd2" required/>
		<br />
			<input type ="submit" value="OK" name="submit" />
        </form>
		<div>
            <form action="my_account.php" method="post"><input type="submit" value="Retour"></form>
        </div>
        
	</body>
</html>