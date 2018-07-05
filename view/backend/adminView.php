<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 13:49
 */

$title='Espace administrateur';

ob_start();

if(isset($testpassword) && $testpassword==1){
    echo 'Erreur : Le nom d\'utilisateur n\'existe pas ou le mot de passe est incorrect.';
}
else{
    ?>
    <header>
        <h2>Bienvenue dans votre espace d'administration !</h2>
    </header>
<section>
        <div class="jumbotron">
            <h3>Gestion des chapitres</h3>
            <a href="rediger-un-chapitre">Rédiger un nouveau chapitre</a><br>
            <a href="modifier-un-chapitre">Modifier ou Supprimer un chapitre existant</a><br>
        </div>

        <div class="jumbotron">
          <h3>Gestion des commentaires</h3>
            Il y a
            <?php
            if($count==0){
                echo $count;
            }
            else{
                ?><span class="badge"><?php echo $count;
            }
            ?>
            </span> commentaire(s) signalé(s).<br><a href="moderer-les-commentaires">Modérer les commentaires</a>
        </div>

        <div class="jumbotron">
            <h3>Gestion du compte</h3>
            <a href="changer-mot-de-passe">Modifier mon mot de passe</a>
        </div>
</section>
<?php
}

$content=ob_get_clean();
require('view/template.php');
?>