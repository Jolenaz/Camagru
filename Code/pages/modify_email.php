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
    <?php
        include('../css/css.php');
    ?>
</head>
	<body>
		<div class="navigation_box">
		<form class="navigation_box_component"method="POST" action="../server/modify_m.php">
			Mot de passe: <input class="navigation_box_text" type="password" name="passwd" required/>
		<br />
			Nouvel email: <input class="navigation_box_text"type="email" name="mail" required/>
			<input class="nav_button" type ="submit" value="OK" name="submit" />
        </form>
		<div>
            <form class="navigation_box_component"action="my_account.php" method="post"><input class="nav_button"type="submit" value="Retour"></form>
        </div>
        </div>
	</body>
</html>