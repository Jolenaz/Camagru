<?PHP
	session_start();
	if($_SESSION['log']==true)
		header('Location: main.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer un compte</title>
    <?php
        include('../css/css.php');
    ?>
</head>
<body>
			<h1 style="texte-align:center;">Inscrivez-vous:</h1>
	<div class="navigation_box">

		<form class="navigation_box_component" method="POST" action="../server/create.php">
			Identifiant: <input class="navigation_box_text" type="text" name="login" maxlength="30" required/>
			<br />
			Mot de passe: <input class="navigation_box_text"type="password" name="passwd" required/>
			<br />
			Cofirmation du mot de passe: <input class="navigation_box_text"type="password" name="passwd2" required/>
			<br />
			Courriel: <input class="navigation_box_text"type="email" name="mail" required/>
			<br />
			<input class="nav_button" type="submit" value="OK" name="submit" />
            </form>
        <div>
            <form class="navigation_box_component" action="connection.php" method ="post"><input class="nav_button" type="submit" value="Annuler"></form>
        </div>
	</div>
	</body>
</html>