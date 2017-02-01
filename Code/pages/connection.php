<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Connectez-vous :</title>

</head>

<body>
    <h1 style="texte-align:center;">Connectez-vous :</h1>
    <section id="ConnectionBox">
        <form method="POST" action="../scripts/auth.php">
            <span>
					Identifiant:<input type="text" name="login" maxlength="30" required><br>
					Mot de Passe:<input type="password" name="passwd" required>
				</span>
            <input type="submit" name="Connection">
        </form>
        <form action="create_account.php">
            <input type="submit" value="Créer un compte" />
        </form>
        <form action="lostMail.php">
            <input type="submit" value="Mots de passe oublié" />
        </form>
        <div>
            <form action="../index.php" method="post"><input type="submit" value="Retour Accueil"></form>
        </div>
    </section>
</body>

</html>