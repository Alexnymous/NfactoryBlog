<?php

if(isset($_POST["articles"])) {
    $tabErreur = array();
    $titre = $_POST['title'];
    $chapo = $_POST['chapo'];
    $contenu = $_POST['contenu'];

    if ($_POST["title"] == "")
        array_push($tabErreur, "Veuillez saisir votre titre");
    if ($_POST["chapo"] == "")
        array_push($tabErreur, "Veuillez saisir votre catégorie");
    if ($_POST["contenu"] == "")
        array_push($tabErreur, "Veuillez saisir votre contenu");

    if (count($tabErreur) != 0) {
        $message = "<ul>";
        for ($i = 0; $i < count($tabErreur); $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
    }

    include("./include/formArticle.php");

    $connexion = mysqli_connect("localhost", "nfactoryblog", "nfactoryblog", "nfactoryblog");
    $contenu = addslashes(htmlentities($contenu));
    $chapo = addslashes(utf8_decode(htmlentities($chapo)));
    $titre = addslashes(utf8_decode(htmlentities($titre)));
    $requete2 = "INSERT INTO `t_articles` (ID_ARTICLE, ARTTITRE, ARTCHAPO,ARTCONTENU,ARTDATE) VALUES (NULL, '$titre', '$chapo', '$contenu', NOW())";

    if (mysqli_query($connexion, $requete2))
        echo "Votre article est publié";
    else
        echo "Votre n'a pas pu être publié";
    mysqli_close($connexion);
}

else{
    include("./include/formArticle.php");
}

