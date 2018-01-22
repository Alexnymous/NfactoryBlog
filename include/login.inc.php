<h1>Login</h1>
<?php
if (isset($_COOKIE['pseudo'])) {
    echo 'Bonjour '.$_COOKIE['mail'].' !';
}
else {
    echo '';
}

$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charset=utf8";

$username = "root";
$password = "";

if(isset($_POST['mail']) && isset($_POST['password'])){

    $db = new PDO ($dsn, $username, $password);

    $tabErreur = array();
    $mail = $_POST['mail'];
    $password = $_POST['password'];
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
        echo ($message);}
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $correctPassword = password_verify($_POST['password'], $hash);
    $log = "SELECT * FROM t_users where USERMAIL='$mail' AND USERPASSWORD = '$hash'";

    $query = $db -> query($log);
    $result = $query -> fetch();
    $hash = $result[0];



    if($correctPassword){
        echo "Bienvenu " .$_POST['mail'];
    }else{
        echo "Login ou Password incorrect";

        unset($db);
    }

}else{
    include ("./include/formLogin.php");}

