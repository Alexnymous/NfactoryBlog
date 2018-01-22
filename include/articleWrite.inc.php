<?php
$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charset=utf8";

$username = "root";
$password = "";

if(isset(($_POST["article"]) && ($_POST["title"]) && ($_POST["categorie"]))) {

    $db = new PDO ($dsn, $username, $password);

    $tabErreur = array();
    $title = $_POST['title'];
    $chapo = $_POST['categorie'];
    $article = $_POST['article'];
    if($_POST["title"] == "")
        array_push($tabErreur, "Veuillez saisir un titre");
    if($_POST["categorie"] == "")
        array_push($tabErreur, "Veuillez saisir un sous-titre");
    if($_POST["article"] == "")
        array_push($tabErreur, "Veuillez saisir un article");
    $title = addslashes(htmlentities($title));
    $chapo = addslashes(htmlentities($chapo));
    $article = addslashes(htmlentities($_POST['article']));
    if(count($tabErreur) != 0) {
        $message = "<ul>";
        for($i = 0 ; $i < count($tabErreur) ; $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo($message);
    }

        else {
            $requete = "INSERT INTO t_articles (ID_ARTICLE, ARTTITRE, ARTCHAPO,
                        ARTCONTENU, ARTDATE)
                        VALUES (NULL, '$title', '$chapo', '$article', NOW());";

            $new = $db -> exec($sql);}

            if(mysqli_query($connexion, $requete))
                echo "<p>Votre article a bien été ajouté.</p>";
            else
                echo "<p>Erreur base de données.</p>";
            mysqli_close($connexion);

            unset($db);}

    include ("./include/formArticle.php");


