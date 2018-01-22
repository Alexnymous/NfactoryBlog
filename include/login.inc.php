<h1>Login</h1>
<?php
$dsn = "mysql:dbname=nfactoryblog;
        host=localhost;
        charset=utf8";

$username = "root";
$password = "";

if(isset($_POST['mail']) && isset($_POST['password'])){
    $query = $dsn->prepare ('SELECT USERPASSWORD FROM t_users where USERMAIL = :mail');
    $query->bindParam (':mail', $_POST['mail']);
    $query->execute();
    $result = $query->fetch();
    $hash = $result[0];

    $correctPassword = password_verify($_POST['password'], $hash);

    if($correctPassword){
        echo "Bienvenu " .$_POST['USERMAIL'];
    }else{
        echo "Login ou Password incorrect";
    }
}
else{
    include ("./include/formLogin.php");
}

