<?php
$header = "<header>";
$header .= "<ul>";
$header .= "<li><a href=\"index.php?page=accueil\">Accueil</a></li>";
if (!isset($_SESSION['login'])) {
    $header .= "<li><a href=\"index.php?page=inscription\">Inscription</a></li>";
    $header .= "<li><a href=\"index.php?page=login\">Login</a></li>";
    $header .= "<li><a href=\"index.php?page=recup\">Mot de passe perdu</a></li>";
}
else {
    $header .= "<li><a href=\"index.php?page=compte\">Mon compte</a></li>";
    $header .= "<li><a href=\"index.php?page=articleWrite\">Rédiger un article</a></li>";
    $header .= "<li><a href=\"index.php?page=logout\">Logout</a></li>";
}
$header .= "</ul>";
$header .= "</header>";
echo $header;

if (isset($_SESSION['admin'])){
    echo ("<li><a href=\"index.php?page=admin\">Administration </a></li>");
}
