<?php
require_once('../class/class.php');
function pull_sprites(){
    try {
        $dbh = new PDO("mysql:dbname=Cama;host=localhost", "root", "");
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        return (null);
    }

    $sth = $dbh->prepare("SELECT * FROM `Sprites`");
    $sth->execute();

    $sprites = array();

    while($result = $sth->fetch(PDO::FETCH_ASSOC))
    {
        $pro = new sprite(array('id' => $result['id'], 'name' => $result['name']));
        $sprites[] = $pro;
    }

    $sth = null;
    $dbh = null;

    return $sprites;
}

?>