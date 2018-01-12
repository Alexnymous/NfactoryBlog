<h1>Login</h1>
<?php
if (isset($_POST['login'])) {
    $tabErreur = array();
    $mail = $_POST['mail'];
    $password = $_POST['mdp'];
    if ($mail == "")
        array_push($tabErreur, "Veuillez saisir une adresse");
    if ($password == "")
        array_push($tabErreur, "Veuillez saisir un mot de passe");
    if (count($tabErreur) > 0) {
        $message = "<ul>";
        for ($i = 0 ; $i < count($tabErreur) ; $i++) {
            $message .= "<li>" . $tabErreur[$i] . "</li>";
        }
        $message .= "</ul>";
        echo ($message);
        include ("./include/formLogin.php");
    }
    else {
        $connexion = mysqli_connect("localhost", "NFactoryBlog", "NFactoryBlog", "nfactoryblog");
        if (!$connexion) {
            die("Erreur MySQL " . mysqli_connect_errno() . " : " . mysqli_connect_error());
        }
        else {
            $password = sha1($password);
            $requete = "SELECT * FROM t_users WHERE USERMAIL='$mail' AND USERPASSWORD='$password'";
            die($requete);
            mysqli_query($connexion, $requete);
            mysqli_close($connexion);
        }
    }
}
else {
    include ("./include/formLogin.php");
}
}
/*$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
// Vérification des identifiants
$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
$req->execute(array(
    'login' => $login,
    'mdp' => $mdp_hache));
$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['login'] = $login;
    echo 'Vous êtes connecté !';
}
session_start();
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');*/