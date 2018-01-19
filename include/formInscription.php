<form method="post" action="#">
    <div>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" placeholder="Nom" />
    </div>
    <div>
        <label for="prenom">Prénom : </label>
        <input type="text" name="prenom" placeholder="Prénom" />
    </div>
    <div>
        <label for="mail">E-mail : </label>
        <input type="email" name="mail" placeholder="E-mail" />
    </div>
    <div>
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" placeholder="Mot de passe" />
    </div>
    <div>
        <label for="confirmdp">Confirmation mot de passe : </label>
        <input type="password" name="confirmdp" placeholder="Confirmation" />
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Clique-moi !" name="formulaire" />
    </div>
    <div>
        <label for="mail">Récupération mot de passe </label>
        <input type="email" name="recup" placeholder="Saisir votre adresse mail" />
        <input type="submit" value="envoyer" name="recup_submit" />
    </div>

</form>