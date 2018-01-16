<h1>Mon compte</h1>	

<?php
if(isset($_POST["formulaire"])) {
    $tabErreur = array();
    $title = $_POST['title'];
    $chapo = $_POST['chapo'];
    $contenu = $_POST['contenu'];
    
    if($_POST["title"] == "")
        array_push($tabErreur, "Veuillez saisir votre titre");
    if($_POST["chapo"] == "")
        array_push($tabErreur, "Veuillez saisir votre");
    if($_POST["contenu"] == "")
        array_push($tabErreur, "Veuillez saisir votre contenu");
    
    if(count($tabErreur) != 0) {
        $message = "<ul>";
        for($i = 0 ; $i < count($tabErreur) ; $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/formArticle.php");
    }
    else {
        $connexion = mysqli_connect("localhost", "NFactoryBlog", "NFactoryBlog", "nfactoryblog");
        if (!$connexion) {
            die("Erreur MySQL " . mysqli_connect_errno() . " : " . mysqli_connect_error());
        }
        else {
            /*$requete = "INSERT INTO t_articles (ID_USER, USERNAME, USERFNAME,
                        USERMAIL, USERPASSWORD, USERDATEINS, T_ROLES_ID_ROLE)
                        VALUES (NULL, '$nom', '$prenom', '$mail', '$mdp', NULL, 5);";
            mysqli_query($connexion, $requete);
            mysqli_close($connexion);
        }
    }
}*/
else {
    echo("Je viens d'ailleurs");
    include("./include/formArticle.php");
}
