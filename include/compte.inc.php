<h1>Mon compte</h1>	

<?php
if(isset($_POST["recentArticles"])) {
    $tabErreur = array();
    $title = $_POST['title'];
    $chapo = $_POST['chapo'];
    $contenu = $_POST['contenu'];

    if ($_POST["title"] == "")
        array_push($tabErreur, "Veuillez saisir votre titre");
    if ($_POST["chapo"] == "")
        array_push($tabErreur, "Veuillez saisir votre");
    if ($_POST["contenu"] == "")
        array_push($tabErreur, "Veuillez saisir votre contenu");

    if (count($tabErreur) != 0) {
        $message = "<ul>";
        for ($i = 0; $i < count($tabErreur); $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/articleWrite.php");
    } else {
        $connexion = mysqli_connect("localhost", "NFactoryBlog", "nfactoryblog", "nfactoryblog");
        if (!$connexion) {
            die("Erreur MySQL " . mysqli_connect_errno() . " : " . mysqli_connect_error());
        } else {
            echo("Je viens d'ailleurs");
        }
    }
}