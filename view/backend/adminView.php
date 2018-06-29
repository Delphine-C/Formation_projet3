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

        <div class="jumbotron">
            <h2>Gestion des chapitres</h2>
            <a href="index.php?addChapter">Rédiger un nouveau chapitre</a><br>
            <a href="index.php?modifyChapter">Modifier ou Supprimer un chapitre existant</a><br>
        </div>

        <div class="jumbotron">
          <h2>Gestion des commentaires</h2>
            Il y a <?php echo $count ?> commentaire(s) signalé(s). <a href="index.php?moderate">Modérer les commentaires</a>
        </div>

        <div class="jumbotron">
            <h2>Gestion du compte</h2>
            <a href="index.php?changepw">Modifier mon mot de passe</a>
        </div>
<?php
}

$content=ob_get_clean();
require('view/template.php');
?>