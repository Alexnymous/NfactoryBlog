<h1>Inscription</h1>
<?php
$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charset=utf8";

$username = "root";
$password = "";



if(isset($_POST["nom"]) && ($_POST["prenom"]) && ($_POST["mail"]) && ($_POST["mdp"]) && ($_POST["mdp"]) && ($_POST["confirmdp"])) {

    $db = new PDO ($dsn, $username, $password);

    $tabErreur = array();
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    if($_POST["nom"] == "")
        array_push($tabErreur, "Veuillez saisir votre nom");
    if($_POST["prenom"] == "")
        array_push($tabErreur, "Veuillez saisir votre prénom");
    if($_POST["mail"] == "")
        array_push($tabErreur, "Veuillez saisir votre e-mail");
    if($_POST["mdp"] == "")
        array_push($tabErreur, "Veuillez saisir un mot de passe");

    if($_POST ["mdp"] == $_POST["confirmdp"]){
        $hash = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $sql = "INSERT INTO t_users (ID_USER, USERNAME, USERFNAME, USERMAIL, USERPASSWORD, USERDATEINS, T_ROLES_ID_ROLE) VALUES (NULL, '$nom', '$prenom', '$mail', '$hash', NULL, 5)";

        $new = $db -> exec($sql);

        unset($db);
    }

}else{
    include ("./include/formInscription.php");
}

  ?>