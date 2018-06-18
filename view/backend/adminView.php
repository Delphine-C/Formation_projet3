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
    echo 'Erreur : Le nom d\'utilisateur n\'existe pas.';
}
elseif(isset($testpassword) && $testpassword==2){
    echo 'Erreur : le mot de passe est incorrect.';
}
else{
    ?>
    <h1>Bienvenue dans votre espace d'administration !</h1>

    <h2>Gestion des chapitres</h2>

    <a href="index.php?addChapter">Rédiger un nouveau chapitre</a><br>
    <a href="index.php?modifyChapter">Modifier ou Supprimer un chapitre existant</a><br>

    <h2>Gestion du compte</h2>
    <a href="index.php?changepw">Modifier mon mot de passe</a>
<?php
}

$content=ob_get_clean();
require('view/template.php');
?>