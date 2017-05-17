<div id="nav_remote">
<?php
if ($_SESSION['log'] == false)
{
    echo '
    <form action="connection.php">
        <input class="nav_button" type="submit" value="Se Connecter" />
    </form>
    ';
}
else
{
    echo '
    <form  action="../server/deconnection.php">
        <input class="nav_button" type="submit" value="Deconnection !" />
    </form>
    '; 
    echo '
    <form action="my_account.php">
        <input class="nav_button" type="submit" value="Mon Compte" />
    </form>
    '; 
}
?>
</div>
<div id="site_info">
<p>
    Cama-Gru
</p>

</div>