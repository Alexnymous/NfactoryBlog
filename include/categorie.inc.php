<?php

$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charset=utf8";
$username = "root";
$password = "";

if(isset(($_POST["article"]) && ($_POST["title"]) && ($_POST["categorie"]))) {

    $db = new PDO ($dsn, $username, $password);


    define("MIN_SIZE", 1);
    define("MAX_SIZE", 36);

    $result = ("SELECT *, FROM t_articles GROUP BY ID_CATEGORIE ORDER BY ID_CATEGORIE");

    $min = MAX_INT;
    $max = -MAX_INT;

    while ($idCategorie = mysqli_fetch_assoc($result)) {
        if ($idCategorie['number'] < $min) $min = $idCategorie['number'];
        if ($idCategorie['number'] > $max) $max = $idCategorie['number'];
        $tags[] = $idCategorie;
    }

    $min_size = MIN_SIZE;
    $max_size = MAX_SIZE;

    foreach ($tags as $idCategorie) {
        $idCategorie['size'] = intval($min_size + (($idCategorie['number'] - $min) * (($max_size - $min_size) / ($max - $min))));
        $tags_extended[] = $tag;
} else{}

?>