<h1>Accueil</h1>

<p>
    Bonjour <?php echo $_COOKIE['pseudo']; ?> !
</p>

<?php
$connexion = mysqli_connect("localhost", "root", "", "nfactoryblog");
$query = "SELECT * FROM t_articles ORDER BY ARTDATE DESC LIMIT 1,10;";
$reponse = mysqli_query($connexion, $query);

while ($donnees= mysqli_fetch_array($reponse)) {
    echo("<h2>");
    echo(html_entity_decode($donnees['ARTTITRE']));
    echo("</h2>");
    echo(html_entity_decode($donnees['ARTCONTENU']));
    echo("<hr>");
}

?>


