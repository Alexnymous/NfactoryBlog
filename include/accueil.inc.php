<h1>Accueil</h1>

<?php
echo("<p>Page d'accueil</p>");
$connexion = mysqli_connect("localhost", "root", "", "nfactoryblog");
$reponse = mysqli_query($connexion,"SELECT * FROM t_articles, WHERE ORDER BY ARTDATE DESC LIMIT 1, 5;");
$auteur = 
while ($donnees= mysqli_fetch_array($reponse)) {
    echo("<h2>");
    echo(html_entity_decode($donnees['ARTTITRE']));
    echo("</h2>");
    echo(html_entity_decode($donnees['ARTCONTENU']));
    echo("<hr>");
}
?>