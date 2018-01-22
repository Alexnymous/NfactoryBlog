<h1>Inscription</h1>
<?php
$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charset=utf8";

$username = "root";
$password = "";

if(isset($_POST["nom"]) && ($_POST["prenom"]) && ($_POST["mail"]) && ($_POST["mdp"]) && ($_POST["mdp"]) && ($_POST["confirmdp"])) {

    if($_POST ["mdp"] == $_POST["confirmdp"]){
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        $query = $pdo -> prepare ("INSERT INTO t_users (ID_USER, USERNAME, USERFNAME,USERMAIL, USERPASSWORD, USERDATEINS, T_ROLES_ID_ROLE) VALUES (NULL, '$nom', '$prenom', '$mail', '$hash', NULL, 5)");
        $query->bindParam(':USERNAME', $_POST["nom"]);
        $query->bindParam(':USERFNAME', $_POST["prenom"]);
        $query->bindParam(':USERMAIL', $_POST["mail"]);
        $query->bindParam(':USERPASSWORD', $hash);
        $query->execute();
        exit();
    }

}else{
    include ("./include/formInscription.php");
}
  ?>