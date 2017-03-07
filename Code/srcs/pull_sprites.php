<?php

function pull_sprites(){
    try {
        $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        return (null);
    }

    $sth = $dbh->prepare("SELECT * FROM `Sprites`");
    $sth->execute();

    while($result = $sth->fetch(PDO::FETCH_ASSOC))
    {
        print_r($result);
    }



    $sth = null;
    $dbh = null;
}

?>