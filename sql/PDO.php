<?php
$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charset=utf8";

$username = "root";
$password = "";

//$db = new PDO ($dsn, $username, $password);

try {
$db = new PDO ($dsn, $username, $password);
}

catch (PDOException $e){
    echo ($e -> getmessage());
}

$sql = "SELECT * FROM t_articles";

$resultat = $db -> query($sql);

while (($article = $resultat -> fetch())){
    echo $article ["ARTCONTENU"];
}

// requete insertion

$sql = "INSERT INTO t_articles";
$nbrLignes = $db -> exec($sql);
echo $nbrLignes;

unset($db);

// Formatage par défaut
$db = new PDO ($dsn, $username, $password);
$db -> setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC
);

//Formatage pour un jeu de résultat
$resultat = $db -> query("SELECT");
$resultat -> setFetchMode(PDO::FETCH_ASSOC);

while(($resultat = $article -> fetch())){
    var_dump($resultat);
}

// A chaque appel

$resultat = $db -> query ("SELECT");
while (($article = $resultat -> fetch(PDO::FETCH_ASSOC))){
    var_dump($article);
}
