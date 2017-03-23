<?PHP
	session_start();
	if($_SESSION['log']==false)
		header('Location: main.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon compte</title>
	<link rel="stylesheet" href="../../css/create_account.css">
</head>
	<body>
		<form method="POST" action="../server/modify_s.php">
			Mot de passe: <input  type="password" name="passwd" required/>
			<input type ="submit" value="SUPPRIMER !!!!" name="submit" />
        </form>
		<div>
            <form action="my_account.php" method="post"><input type="submit" value="Retour"></form>
        </div>
	</body>
</html>