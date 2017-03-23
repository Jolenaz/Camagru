<?php
if ($_SESSION['log'] == false)
{
    echo '
    <form action="connection.php">
        <input type="submit" value="Identifiez-vous !" />
    </form>
    ';
}
else
{
    echo '
    <form action="../server/deconnection.php">
        <input type="submit" value="Deconnection !" />
    </form>
    '; 
    echo '
    <form action="my_account.php">
        <input type="submit" value="Mon Compte" />
    </form>
    '; 
}
?>