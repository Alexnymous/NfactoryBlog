<h1>Inscription</h1>
<?php
if(isset($_POST["formulaire"])) {
    $tabErreur = array();
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $confirmdp = $_POST['confirmdp'];
    if($_POST["nom"] == "")
        array_push($tabErreur, "Veuillez saisir votre nom");
    if(filter_var($nom, FILTER_SANITIZE_STRING))
    if($_POST["prenom"] == "")
        array_push($tabErreur, "Veuillez saisir votre prénom");
    if(!filter_var($prenom, FILTER_SANITIZE_STRING));

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        ;
    }
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    $confirm = password_verify($confirmdp, $hash);

    if($confirm){
        ;
    } else{
        array_push($tabErreur, "Veuillez saisir votre mot de passe");
    }

    if(count($tabErreur) != 0) {
        $message = "<ul>";
        for($i = 0 ; $i < count($tabErreur) ; $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo($message);
        include("./include/formInscription.php");
    }
    else {
        $connexion = mysqli_connect("localhost", "nfactoryblog", "nfactoryblog", "nfactoryblog");
        if (!$connexion) {
            die("Erreur MySQL " . mysqli_connect_errno() . " : " . mysqli_connect_error());
        }
        else {
            $requete = "INSERT INTO t_users (ID_USER, USERNAME, USERFNAME,
                        USERMAIL, USERPASSWORD, USERDATEINS, T_ROLES_ID_ROLE)
                        VALUES (NULL, '$nom', '$prenom', '$mail', '$hash', NULL, 5);";

            if(mysqli_query($connexion, $requete))
                echo("<p>Votre inscription a bien été effectuée. Vous allez prochainement recevoir un mail de confirmation.</p>");
            else
                echo("<p>Erreur sur la base de données, veuillez réessayer.</p>");

            mysqli_close($connexion);
        }
    }
}
else {
    include("./include/formInscription.php");
}