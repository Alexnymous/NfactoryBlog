<h1>Accueil</h1>

<p>
    Bonjour <?php echo $_COOKIE['pseudo']; ?> !
</p>

<?php
$connexion = mysqli_connect("localhost", "root", "", "nfactoryblog");
$query = "SELECT * FROM t_articles ORDER BY ARTCONTENU, ARTDATE ASC LIMIT 1,10;";
$reponse = mysqli_query($connexion, $query);



while ($donnees= mysqli_fetch_array($reponse)) {
    echo (html_entity_decode( "<div>"."<br/>" . "<h2>".$donnees['ARTTITRE'] . "</h2>". "<br/>" . "<h3>".  $donnees['ARTCHAPO'] ."</h3>". "<br/>" . "<div>". $donnees['ARTCONTENU'] ."</div>" . "<br/>" . "</div>" .  "<hr/>"));
    echo "Publié le: " . date ("d/n/Y H:i.",  getlastmod());
    echo("<p>");
    echo "Modifié le: " . date ("d/n/Y H:i.");
    echo("<hr>");


}

//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total = mysqli_query('SELECT COUNT(*) AS total FROM t_articles'); //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total = mysqli_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.


$messagesParPage = 2; //Nous allons afficher 2 messages par page.

//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total = mysqli_query('SELECT COUNT(*) AS total FROM t_articles'); //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total = mysqli_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.

//Nous allons maintenant compter le nombre de pages.
$nombreDePages = ceil($total/$messagesParPage);

if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
    $pageActuelle=intval($_GET['page']);

    if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
    {
        $pageActuelle=$nombreDePages;
    }
}
else // Sinon
{
    $pageActuelle=1; // La page actuelle est la n°1
}

$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.
$retour_messages=mysqli_query('SELECT * FROM t_articles ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');

while($donnees_messages=mysqli_fetch_assoc($retour_messages)) // On lit les entrées une à une grâce à une boucle
{
    //Je vais afficher les messages dans des petits tableaux. C'est à vous d'adapter pour votre design...
    //De plus j'ajoute aussi un nl2br pour prendre en compte les sauts à la ligne dans le message.
    echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                     <td><strong>Ecrit par : '.$donnees_messages['pseudo'].'</strong></td>
                </tr>
                <tr>
                     <td>'.nl2br($donnees_messages['message']).'</td>
                </tr>
            </table><br /><br />';
    //J'ai rajouté des sauts à la ligne pour espacer les messages.
}