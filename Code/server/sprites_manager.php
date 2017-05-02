<?php
require_once('../class/class.php');


function pull_sprites(){
    require_once('../config/database.php');

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e){
        print ("Erreur!: " . $e->getMessage() . "<br/>");
        die();
    }

    $sth = $dbh->prepare("SELECT * FROM `Sprites`");
    $sth->execute();

    $sprites = array();

    while($result = $sth->fetch(PDO::FETCH_ASSOC))
    {
        $pro = new sprite(array('id' => $result['id'], 'name' => $result['name'], 'format' => $result['format'],));
        $sprites[] = $pro;
    }

    $sth = null;
    $dbh = null;

    return $sprites;
}

?>